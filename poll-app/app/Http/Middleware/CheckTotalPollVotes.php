<?php

namespace App\Http\Middleware;

use App\Models\Poll;
use Closure;
use Illuminate\Http\Request;
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
        $activePolls = Poll::where('poll_closed', false)->get();

        foreach ($activePolls as $activePoll) {
            if ($activePoll->no_of_allowed_votes <= $activePoll->votes->count()) {
                $activePoll->poll_closed = true;
                $activePoll->save();
            }
        }

        return $next($request);
    }
}
