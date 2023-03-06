<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    function showVotePage(Request $request)
    {

        return view('/vote', ['voteOption' => $request]);
    }
}
