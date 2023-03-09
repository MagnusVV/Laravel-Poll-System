<?php

namespace App\Http\Middleware;

use App\Models\Poll;
use App\Models\Votes;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckTotalPollVotes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $activePolls = Poll::where('poll_closed', 0);

        return $next($request);
    }
}

// <p>Poll id from votes: {{$poll->votes->first()->poll_id}}</p>
// <p>Original poll id: {{$poll->id}}</p>


// use App\Models\Poll;

// $polls = Poll::all();
// die(var_dump($polls));
