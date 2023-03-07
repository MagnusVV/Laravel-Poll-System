<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    function catchVote(Request $request)
    {

        $voteOption = $request->only("vote-option-name", "poll-id");

        return view('/vote', ['voteOption' => $voteOption]);
    }
}
