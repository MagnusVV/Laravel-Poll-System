<?php

namespace App\Http\Controllers;

use App\Models\Votes;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    function catchVote(Request $request)
    {

        $voteOption = $request->only("vote_option_chosen", "poll_id");

        // MV: Clicking one the "vote" buttons will bring you, along with the vote choice, to below view.
        return view('/vote', ['voteOption' => $voteOption]);
    }

    function storeCastedVote(Request $request)
    {
        $this->validate($request, ['poll_id', 'email', 'vote_option_chosen']);
        $vote = $request->only('poll_id', 'email', 'vote_option_chosen');

        $whereOptions = [
            ['email', '=', $vote['email']],
            ['poll_id', '=', $vote['poll_id'],]
        ];

        // MV: If an already submitted email tries to vote a second time on the same poll, an error message will be shown. It may still vote on a different poll.
        if (Votes::where($whereOptions)->exists()) {

            return redirect('/')->withErrors("A vote from {$vote['email']} has already been cast on this poll. Please retype email if it was misspelled, or perhaps try another poll?");
        } else {
            // MV Successful votes are stored in the database.
            Votes::create(['poll_id' => $vote['poll_id'], 'email' => $vote['email'], 'vote_option_chosen' => $vote['vote_option_chosen']]);

            return redirect('/')->with('message', 'Thank you for voting. Please come again!');
        }
    }
}
