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

        $data =  $this->model->create($requestFillable);
        return $this->success("Success", $data);
    }
}
