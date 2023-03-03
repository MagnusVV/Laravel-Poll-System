<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\User;
use App\Models\VoteOption;
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
        return view('index', ['polls' => Poll::all(), 'users' => User::all(['id', 'user_name']), 'vote_options' => VoteOption::all(['poll_id', 'vote_option_1', 'vote_option_2'])]);
    }

    public function voteOptions()
    {
        $pollsVoteOptionsJoined = DB::table('polls')
            ->join('vote_options', 'polls.id', '=', 'vote_options.poll_id')->select('vote_options.poll_id', 'vote_option_1', 'vote_option_2')->get();

        return view('index', $pollsVoteOptionsJoined);
    }
}


// {{$vote_options->where($vote_options->poll_id, '=' , $poll->id)->vote_option_1}}
