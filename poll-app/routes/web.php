<?php

use App\Http\Controllers\CreatePollController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'index')->name('login')->middleware('guest');

Route::post('login', LoginController::class);

Route::post('polls', CreatePollController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::get('logout', LogoutController::class);

Route::post('add-user', RegistrationController::class);
