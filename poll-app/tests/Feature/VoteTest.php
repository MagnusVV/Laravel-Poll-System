<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Poll;

class VoteTest extends TestCase
{

    use RefreshDatabase;

    public function test_cast_vote_first_option()
    {
        $response = $this
            ->post('/vote', [
                'poll_id' => 1,
                'vote_option_chosen' => 'Option 1'
            ]);

        $response->assertStatus(200);
        $response->assertSeeText('You have chosen the option Option 1. Please submit your email below to cast your vote.');
    }

    public function test_cast_vote_second_option()
    {
        $response = $this
            ->post('/vote', [
                'poll_id' => 1,
                'vote_option_chosen' => 'Option 2'
            ]);

        $response->assertStatus(200);
        $response->assertSeeText('You have chosen the option Option 2. Please submit your email below to cast your vote.');
    }

    public function test_store_casted_vote()
    {
        $poll = Poll::factory()->create();

        $response = $this
            ->post('/vote-cast', [
                'poll_id' => $poll->id,
                'email' => 'example@yrgo.se',
                'vote_option_chosen' => 'vote_option_chosen'
            ]);

        $this->assertDatabaseHas('votes', ['vote_option_chosen' => 'vote_option_chosen']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
