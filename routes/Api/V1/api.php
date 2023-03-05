<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Devices\DevicesController;
use App\Http\Controllers\Api\V1\Disease\DiseasesController;
use App\Http\Controllers\Api\V1\Exercise\ExercisesController;
use App\Http\Controllers\Api\V1\Task\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function() {

    // Public Routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    // Private Routes
    Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
        Route::apiResource('/tasks', TasksController::class);
        Route::apiResource('/exercises', ExercisesController::class);
        Route::apiResource('/diseases', DiseasesController::class);
        Route::apiResource('/devices', DevicesController::class);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});



