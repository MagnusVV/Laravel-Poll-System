<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class ClosePollController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Poll $poll)
    {
        $poll->poll_closed = true;
        $poll->save();
        return redirect('dashboard');
    }
}
