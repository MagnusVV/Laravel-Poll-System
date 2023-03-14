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
// Routes for the navbar on Index page
Route::get('/active-polls', [LandingpageController::class, 'activePollinfo']);
Route::get('/closed-polls', [LandingpageController::class, 'closedPollinfo']);
Route::view('/login-user', '/login-user');
Route::view('/register-user', '/register-user');
// Routes for adding new users, and for logging in users:
Route::post('add-user', RegistrationController::class);
Route::post('login', LoginController::class);
//Routes for selecting vote poll vote options, and for registering email to finalise voting:
Route::post('vote', [VoteController::class, 'catchVote']);
Route::post('vote-cast', [VoteController::class, 'storeCastedVote']);

Route::get('dashboard', [DashboardController::class, 'showDashboard'])->middleware('auth');
Route::get('dashboard-completed-polls', [DashboardController::class, 'showCompletedPolls'])->middleware('auth');
//Routes for creating, closing and removing polls:
Route::post('polls', CreatePollController::class);
Route::patch('polls/{poll}/closed', [ClosePollController::class, 'closePoll'])->middleware('auth');
Route::delete('poll/{poll}/removed', [ClosePollController::class, 'removePoll'])->middleware('auth');
// Logout:
Route::get('logout', LogoutController::class);
