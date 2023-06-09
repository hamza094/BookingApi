<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Owner\PropertyController;
use App\Http\Controllers\Public\PropertySearchController;
use App\Http\Controllers\Owner\PropertyPhotoController;
use App\Http\Controllers\Public;
use App\Http\Controllers\User\BookingController;


Route::post('auth/register', RegisterController::class);

Route::middleware('auth:sanctum')->group(function() {

  Route::prefix('owner')->group(function () {
    Route::get('properties',[PropertyController::class, 'index']);
    Route::post('properties',[PropertyController::class, 'store']);
    Route::post('properties/{property}/photos',[PropertyPhotoController::class, 'store']);

    Route::post('properties/{property}/photos/{photo}/reorder/{newPosition}',
        [PropertyPhotoController::class, 'reorder']);
});
 
  Route::prefix('user')->group(function () {
      Route::resource('bookings', BookingController::class);
});

});

Route::get('search',PropertySearchController::class);

Route::get('properties/{property}',Public\PropertyController::class);

Route::get('apartments/{apartment}', Public\ApartmentController::class);
