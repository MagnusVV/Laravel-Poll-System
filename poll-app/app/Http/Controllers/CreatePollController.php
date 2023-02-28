<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'no_of_allowed_votes -> required|integer'
        ]);

        $poll = $request->only(['poll_title', 'poll_description', 'date_closing', 'no_of_allowed_votes']);

        $poll['user_id'] = Auth::id();

        Poll::create($poll);
        return Redirect::to('dashboard');
    }
}
