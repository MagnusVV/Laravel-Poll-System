<?php

namespace App\Http\Middleware;

use App\Models\Poll;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckPollDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $dateToday = Carbon::now();

        $activePolls = Poll::where('poll_closed', false)->get();

        foreach ($activePolls as $activePoll) {
            if ($activePoll->date_closing < $dateToday) {
                $activePoll->poll_closed = true;
                $activePoll->save();
            }
        }

        return $next($request);
    }
}
