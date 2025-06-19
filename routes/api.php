<?php

use App\Http\Controllers\EventAddOnController;
use App\Http\Controllers\EventSpaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventPackageController;
use App\Http\Controllers\DishCategoryController;
use App\Http\Controllers\EventMenuController;
use App\Http\Controllers\EventReservationController;

Route::apiResource('event_spaces', EventSpaceController::class);
Route::apiResource('event_packages', EventPackageController::class);
Route::apiResource('event_add_ons', EventAddOnController::class);
Route::apiResource('dish_categories', DishCategoryController::class);
Route::apiResource('event_menus', EventMenuController::class);
Route::apiResource('event_reservations', EventReservationController::class);


// Route::post('event_menus/upload', [EventMenuController::class, 'store']);
// Route::get('event_spaces/search', [EventSpaceController::class, 'search']);
// Route::get('event_menus/search', [EventMenuController::class, 'search']);
// Route::get('dish_categories/search', [DishCategoryController::class, 'search']);
// Route::get('event_packages/search', [EventPackageController::class, 'search']);

// Event Package Routes
// Route::prefix('event-packages')->group(function () {
//     Route::get('/', [EventPackageController::class, 'index']);
//     Route::post('/', [EventPackageController::class, 'store']);
//     Route::get('/statistics', [EventPackageController::class, 'statistics']);
//     Route::post('/bulk-operations', [EventPackageController::class, 'bulkOperations']);
//     Route::get('/{id}', [EventPackageController::class, 'show']);
//     Route::put('/{id}', [EventPackageController::class, 'update']);
//     Route::patch('/{id}', [EventPackageController::class, 'update']);
//     Route::delete('/{id}', [EventPackageController::class, 'destroy']);
// });
