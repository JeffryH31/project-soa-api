<?php

namespace App\Http\Controllers;

use App\Models\EventReservation;
use Illuminate\Http\Request;

class EventReservationController extends BaseController
{
    public function __construct(EventReservation $model)
    {
        parent::__construct($model);
    }


}
