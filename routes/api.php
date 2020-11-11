<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', LoginController::class);
Route::post('register', RegisterController::class);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', LogoutController::class);

    // Get the authenticated user information
    Route::get('auth', [AuthController::class, 'index']);
    Route::post('auth', [AuthController::class, 'update']);

    // Get list of users
    Route::get('users', [UserController::class, 'index']);

    Route::post('change-password', ChangePasswordController::class);
});

