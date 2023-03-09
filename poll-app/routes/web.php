<?php

use App\Http\Controllers\ClosePollController;
use App\Http\Controllers\CreatePollController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VoteOptionsController;

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

Route::get('/', [LandingpageController::class, 'pollinfoIndexpage'])->middleware('guest', 'checkPollDate', 'checkTotalPollVotes');

Route::post('login', LoginController::class);

Route::post('polls', CreatePollController::class);

Route::post('vote-options', VoteOptionsController::class);

Route::get('dashboard', [DashboardController::class, 'showDashboard'])->middleware('auth');

Route::get('dashboard-completed-polls', [DashboardController::class, 'showCompletedPolls'])->middleware('auth');

Route::get('logout', LogoutController::class);

Route::post('add-user', RegistrationController::class);

Route::patch('polls/{poll}/closed', ClosePollController::class)->middleware('auth');

Route::post('vote', [VoteController::class, 'catchVote']);
Route::post('vote-cast', [VoteController::class, 'storeCastedVote']);

Route::get('/active-polls', [LandingpageController::class, 'activePollinfo']);
Route::get('/closed-polls', [LandingpageController::class, 'closedPollinfo']);
Route::view('/login-user', '/login-user');
Route::view('/register-user', '/register-user');
