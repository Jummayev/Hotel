<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
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

Route::resource('hotels', HotelController::class);
Route::resource('users', UserController::class);
Route::get("home", [DataController::class, 'home']);

