<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class ClosePollController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function closePoll(Poll $poll)
    {
        $poll->poll_closed = true;
        $poll->save();
        return redirect('dashboard');
    }

    public function removePoll(Poll $poll)
    {
        $poll->delete();
        return redirect('dashboard-completed-polls');
    }
}
