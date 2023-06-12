<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//cars Route for managing cars stored in DB
Route::get('/cars', [CarController::class, 'index']);

Route::post('/cars', [CarController::class, 'store']);

Route::get('cars/{id}', [CarController::class, 'show']);

Route::put('/cars/{id}', [CarController::class, 'update']);


//Appointments route for manages appointments

// Get all available appointments
Route::get('/appointments', [AppointmentController::class, 'index']);

// Get single appointment
Route::get('/appointments/{id}', [AppointmentController::class, 'show']);

// Add a new appointment
Route::post('/appointments', [AppointmentController::class, 'store']);

// Update single appointment
Route::put('appointments/{id}', [Appointment::class, 'update']);

// Get available appointments in a day
Route::get('appointments/available/{date}', [AppointmentController::class, 'getAvailableAppointments']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
