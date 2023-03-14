<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\VoteOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Store selected inputs from user into $poll.
        $poll = $request->only(['poll_title', 'poll_description', 'date_closing', 'no_of_allowed_votes']);
        // Store selected inputs from user into $voteOption from the same form.
        $voteOption = $request->only(['poll_id', 'vote_option_1', 'vote_option_2']);

        // Set polls "user_id" as the id from the logged in user.
        $poll['user_id'] = Auth::id();

        // Store the newly created poll in $newPoll.
        $newPoll = Poll::create($poll);

        // Assign "poll_id" the newly created polls id.
        $voteOption['poll_id'] = $newPoll['id'];

        VoteOption::create($voteOption);

        return redirect('dashboard');
    }
}
