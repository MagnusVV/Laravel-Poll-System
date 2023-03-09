<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function pollinfoIndexpage()
    {

        // MV: This will be used to print out the open polls on the INDEX page.
        $polls = DB::table('polls')
            ->join('vote_options', 'polls.id', '=', 'vote_options.poll_id')
            ->join('users', 'polls.user_id', '=', 'users.id')
            ->select('*')->get();

        return view('index', ['polls' => $polls]);
    }

    public function activePollinfo()
    {

        // MV: This will be used to print out the polls on the OPEN POLLS page.
        $activePolls = DB::table('polls')
            ->join('vote_options', 'polls.id', '=', 'vote_options.poll_id')
            ->join('users', 'polls.user_id', '=', 'users.id')
            ->select('*')->get();

        return view('active-polls', ['polls' => $activePolls]);
    }

    public function closedPollinfo()
    {

        // MV: This will be used to print out the polls on the CLOSED POLLS page.
        $closedPolls = Poll::where('poll_closed', true)->get();

        return view('closed-polls', ['polls' => $closedPolls]);
    }
}
