<?php

namespace App\Http\Controllers;

use App\Models\EventSpace;
use Illuminate\Http\Request;

class EventSpaceController extends BaseController
{
    public function __construct(EventSpace $model)
    {
        parent::__construct($model);
    }
}
