<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\User;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('index', ['polls' => Poll::all(), 'users' => User::all(['id', 'user_name'])]);
    }
}
