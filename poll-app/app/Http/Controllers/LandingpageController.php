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

    public function pollinfo()
    {

        // MV: This will be used to print out the open polls on the voting page.
        $polls = DB::table('polls')
            ->join('vote_options', 'polls.id', '=', 'vote_options.poll_id')
            ->join('users', 'polls.user_id', '=', 'users.id')
            ->select('*')->get();

        return view('index', ['polls' => $polls]);
    }
}
