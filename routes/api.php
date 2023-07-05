<?php
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TiketController;
use Illuminate\Support\Facades\Route;

// Public routes (do not require authentication)
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});

// Protected routes (require authentication)
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::apiResource('/students', StudentController::class);
    Route::apiResource('/tiket', TiketController::class);
    Route::apiResource('/event', EventController::class);
});

