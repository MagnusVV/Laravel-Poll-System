<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showDashboard(Request $request)
    {
        return view('dashboard', ['user' => $request->user()]);
    }

    public function showCompletedPolls(Request $request)
    {
        return view('dashboard-completed-polls', ['user' => $request->user()]);
    }
}
