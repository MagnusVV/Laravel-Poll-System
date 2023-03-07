<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
