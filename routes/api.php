<?php

use App\Http\Controllers\EventSpaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('event_spaces', EventSpaceController::class);
