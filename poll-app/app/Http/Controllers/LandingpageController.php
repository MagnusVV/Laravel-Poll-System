<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pollinfo()
    {
        $polls = DB::table('polls')
            ->join('vote_options', 'polls.id', '=', 'vote_options.poll_id')
            ->join('users', 'polls.user_id', '=', 'users.id')
            ->select('*')->get();

        return view('index', ['polls' => $polls]);
    }
}
