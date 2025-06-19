<?php

use App\Http\Controllers\EventSpaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventPackageController;
use App\Http\Controllers\DishCategoryController;

Route::apiResource('event_spaces', EventSpaceController::class);
Route::apiResource('event_packages', EventPackageController::class);
Route::apiResource('dish_categories', DishCategoryController::class);
Route::get('event_packages/search', [EventPackageController::class, 'search']);

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
