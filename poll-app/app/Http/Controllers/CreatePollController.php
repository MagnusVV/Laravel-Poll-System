<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\VoteOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CreatePollController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'poll_title -> required|string',
            'poll_description -> required|string',
            'date_closing -> required|date',
            'no_of_allowed_votes -> required|integer',
            'vote_option_1 -> required|string',
            'vote_option_2 -> required|string'
        ]);

        $poll = $request->only(['poll_title', 'poll_description', 'date_closing', 'no_of_allowed_votes']);
        $voteOption = $request->only(['poll_id', 'vote_option_1', 'vote_option_2']);

        $poll['user_id'] = Auth::id();

        $newPoll = Poll::create($poll);

        $voteOption['poll_id'] = $newPoll['id'];

        VoteOption::create($voteOption);

        return redirect('dashboard');
    }
}
