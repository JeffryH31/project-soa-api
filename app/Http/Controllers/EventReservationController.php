<?php

namespace App\Http\Controllers;

use App\Models\EventReservation;
use App\Models\EventSpace;
use App\Utils\HttpResponseCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class EventReservationController extends BaseController
{
    public function __construct(EventReservation $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request)
    {
        $requestFillable = $request->only($this->model->getFillable());
        $valid = Validator::make($requestFillable, $this->model->validationRules(), $this->model->validationMessages());
        if ($valid->fails()) {
            return $this->error($valid->errors()->first());
        }

        $event_space = EventSpace::find($requestFillable['event_space_id']);
        if ($event_space->capacity < $requestFillable['pax']) {
            return $this->error("The maximum number of pax for this event space is " . $event_space->capacity, HttpResponseCode::HTTP_NOT_FOUND);
        }

        $requestedStartDate = Carbon::parse($requestFillable['start_date']);
        $requestedEndDate = Carbon::parse($requestFillable['end_date']);
        $eventSpaceId = $requestFillable['event_space_id'];

        $overlappingReservations = $this->model
            ->where('event_space_id', $eventSpaceId)
            ->where(function ($query) use ($requestedStartDate, $requestedEndDate) {
                $query->where('start_date', '<=', $requestedEndDate->toDateString())
                    ->where('end_date', '>=', $requestedStartDate->toDateString());
            })
            ->get(['start_date', 'end_date']);

        if ($overlappingReservations->isNotEmpty()) {
            $conflictingDates = [];
            $requestedPeriod = \Carbon\CarbonPeriod::create($requestedStartDate, $requestedEndDate);

            foreach ($requestedPeriod as $date) {
                $currentDate = $date->toDateString();
                foreach ($overlappingReservations as $existingReservation) {
                    $existingStart = Carbon::parse($existingReservation->start_date);
                    $existingEnd = Carbon::parse($existingReservation->end_date);

                    if ($date->between($existingStart, $existingEnd)) {
                        $conflictingDates[$currentDate] = true;
                    }
                }
            }

            $unavailableDates = array_keys($conflictingDates);

            $dateCount = count($unavailableDates);
            $formattedDates = array_map(fn($date) => Carbon::parse($date)->format('d M Y'), $unavailableDates);

            $errorMessage = sprintf(
                "The date%s %s %s already booked. Please choose other dates.",
                $dateCount > 1 ? 's' : '',
                implode(', ', $formattedDates),
                $dateCount > 1 ? 'are' : 'is'
            );
            return $this->error($errorMessage, HttpResponseCode::HTTP_CONFLICT);
        }

        DB::beginTransaction();
        try {

            $reservation =  $this->model->create([
                'customer_name' => $requestFillable['customer_name'],
                'notes' => $requestFillable['notes'],
                'start_date' => $requestFillable['start_date'],
                'end_date' => $requestFillable['end_date'],
                'pax' => $requestFillable['pax'],
                'event_space_id' => $requestFillable['event_space_id'],
                'total_price' => $requestFillable['total_price'],
            ]);


            if ($request->has('event_menu_id')) {
                $reservation->eventMenus()->attach($request->event_menu_id);
            }

            if ($request->has('event_add_on_id')) {
                $reservation->eventAddOns()->attach($request->event_add_on_id);
            }

            // Send payment request to the payment service
            // $paymentData = [
            //     'customer_id' => $requestFillable['customer_id'],
            //     'requester_type' => 3, // 3 for Event Service
            //     'requester_id' => $reservation->id,
            //     'secondary_requester_id' => null,
            //     'payment_amount' => $requestFillable['total_price'],
            // ];

            // $response = Http::post(env('PAYMENT_SERVICE_URL') . '/routename', $paymentData);
            // if ($response->successful()) {
            //     $paymentResponse = $response->json();

            //     if ($paymentResponse['status'] === 'success') {
            //         $reservation->update(['payment_status' => 'paid']);
            //     } else {
            //         DB::rollBack();
            //         return $this->error("Payment failed: " . $paymentResponse['message']);
            //     }
            // } elseif ($response->clientError() || $response->serverError()) {
            //     DB::rollBack();
            //     return $this->error("Payment service error: " . $response->body());
            // }

            DB::commit();
            return $this->success("Success", $reservation);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), HttpResponseCode::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, $id)
    {
        $event_reservation = $this->model->find($id);

        $valid = Validator::make($request->all(), $this->model->validationRules(), $this->model->validationMessages());
        if ($valid->fails()) {
            return $this->error($valid->errors()->first());
        }

        $requestFillable = $request->only($this->model->getFillable());

        $event_space = EventSpace::find($requestFillable['event_space_id']);
        if ($event_space->capacity < $requestFillable['pax']) {
            return $this->error("The maximum number of pax for this event space is " . $event_space->capacity, HttpResponseCode::HTTP_UNPROCESSABLE_ENTITY);
        }

        $requestedStartDate = Carbon::parse($requestFillable['start_date']);
        $requestedEndDate = Carbon::parse($requestFillable['end_date']);
        $eventSpaceId = $requestFillable['event_space_id'];

        $overlappingReservations = $this->model

            ->where('id', '!=', $event_reservation->id)
            ->where('event_space_id', $eventSpaceId)
            ->where(function ($query) use ($requestedStartDate, $requestedEndDate) {
                $query->where('start_date', '<=', $requestedEndDate->toDateString())
                    ->where('end_date', '>=', $requestedStartDate->toDateString());
            })
            ->get(['start_date', 'end_date']);

        if ($overlappingReservations->isNotEmpty()) {

            $conflictingDates = [];
            $requestedPeriod = \Carbon\CarbonPeriod::create($requestedStartDate, $requestedEndDate);

            foreach ($requestedPeriod as $date) {
                $currentDate = $date->toDateString();
                foreach ($overlappingReservations as $existing) {
                    if ($date->between(Carbon::parse($existing->start_date), Carbon::parse($existing->end_date))) {
                        $conflictingDates[$currentDate] = true;
                    }
                }
            }
            $unavailableDates = array_keys($conflictingDates);
            $dateCount = count($unavailableDates);
            $formattedDates = array_map(fn($date) => Carbon::parse($date)->format('d M Y'), $unavailableDates);
            $errorMessage = sprintf(
                "The date%s %s %s already booked. Please choose other dates.",
                $dateCount > 1 ? 's' : '',
                implode(', ', $formattedDates),
                $dateCount > 1 ? 'are' : 'is'
            );
            return $this->error($errorMessage, HttpResponseCode::HTTP_CONFLICT);
        }


        DB::beginTransaction();
        try {
            $event_reservation->update([
                'status' => $requestFillable['status'],
                'customer_name' => $requestFillable['customer_name'],
                'notes' => $requestFillable['notes'],
                'start_date' => $requestFillable['start_date'],
                'end_date' => $requestFillable['end_date'],
                'pax' => $requestFillable['pax'],
                'event_space_id' => $requestFillable['event_space_id'],
                'total_price' => $requestFillable['total_price'],
            ]);

            if ($request->has('event_menu_id')) {
                $event_reservation->eventMenus()->sync($request->event_menu_id);
            }

            if ($request->has('event_add_on_id')) {
                $event_reservation->eventAddOns()->sync($request->event_add_on_id);
            }

            DB::commit();
            return $this->success("Update Success", $event_reservation->fresh());
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), HttpResponseCode::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
