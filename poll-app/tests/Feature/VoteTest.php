<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use App\Models\Votes;
use App\Models\VoteOption;
use App\Models\Poll;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VoteTest extends TestCase
{

    use RefreshDatabase;

    public function test_first_vote_option()
    {
        // $poll = new Poll();
        // $poll->poll_title = 'Test Poll';
        // $poll->poll_description = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, non.';
        // $poll->user_id = 1;
        // $poll->date_closing = '23-05-05';
        // $poll->no_of_allowed_votes = 10;

        $voteOptions = new VoteOption();
        $voteOptions->poll_id = 1;
        $voteOptions->vote_option_1 = 'First option';
        $voteOptions->vote_option_2 = 'Second option';

        $response = $this
            ->followingRedirects()
            ->post('/vote', [
                'poll_id' => $voteOptions->poll_id,
                'vote_option_chosen' => $voteOptions->vote_option_1,
            ]);

        $response->assertSeeText('You have chosen the option First option. Please submit your email below to cast your vote.');
    }

    public function test_second_vote_option()
    {

        $voteOptions = new VoteOption();
        $voteOptions->poll_id = 1;
        $voteOptions->vote_option_1 = 'First option';
        $voteOptions->vote_option_2 = 'Second option';

        $response = $this
            ->followingRedirects()
            ->post('/vote', [
                'poll_id' => $voteOptions->poll_id,
                'vote_option_chosen' => $voteOptions->vote_option_2,
            ]);

        $response->assertSeeText('You have chosen the option Second option. Please submit your email below to cast your vote.');
    }

    public function test_store_casted_vote()
    {
        $response = $this
            ->followingRedirects()
            ->post('/vote-cast', [
                'poll_id' => 1,
                'email' => 'example@yrgo.se',
                'vote_option_chosen' => 'vote_option_chosen'
            ]);

        $response->assertSeeText('Thank you for voting. Please come again!');
    }
}
