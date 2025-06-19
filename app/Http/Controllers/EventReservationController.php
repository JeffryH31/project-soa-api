<?php

namespace App\Http\Controllers;

use App\Models\EventReservation;
use Illuminate\Http\Request;
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

        $reservation =  $this->model->create([
            'customer_name' => $requestFillable['customer_name'],
            'notes' => $requestFillable['notes'],
            'start_date' => $requestFillable['start_date'],
            'end_date' => $requestFillable['end_date'],
            'pax' => $requestFillable['pax'],
            'event_space_id' => $requestFillable['event_space_id'],
        ]);


        if ($request->has('event_menu_id')) {
            $reservation->eventMenus()->attach($request->event_menu_id);
        }
        return $this->success("Success", $reservation);
    }
}
