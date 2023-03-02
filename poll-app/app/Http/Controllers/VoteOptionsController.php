<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\VoteOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VoteOptionsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'vote_option_1 -> required|string',
            'vote_option_2 -> required|string',
        ]);

        $poll = Poll::latest()->first();

        $voteOption = $request->only(['vote_option_1', 'vote_option_2']);

        $voteOption['poll_id'] = $poll['id'];

        VoteOption::create($voteOption);

        return redirect('dashboard');
    }
}
