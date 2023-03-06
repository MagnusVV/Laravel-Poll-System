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
            ->select('poll_closed', 'poll_title', 'user_name', 'poll_description', 'date_closing', 'no_of_allowed_votes', 'vote_options.id AS vote_option_id', 'vote_option_1', 'vote_option_2')->get();

        return view('index', ['polls' => $polls]);
    }
}
