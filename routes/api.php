<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

Route::apiResource('time-slots', Api\TimeSlotController::class)->only('index', 'show');
Route::apiResource('bookings', Api\BookingController::class);
Route::get('booking-check', [Api\BookingController::class, 'bookingCheck']);