<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard', ['user' => $request->user()], ['polls' => Poll::all(), 'users' => User::all()]);
    }
}
