<?php

namespace App\Http\Controllers;

use App\Models\EventAddOn;
use Illuminate\Http\Request;

class EventAddOnController extends BaseController
{
    public function __construct(EventAddOn $model)
    {
        parent::__construct($model);
    }
}
