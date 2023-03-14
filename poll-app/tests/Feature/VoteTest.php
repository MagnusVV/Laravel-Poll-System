<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

        // WTF!!!
        // $response->assertViewIs('.vote');
        $response->assertStatus(200);
        $response->assertSeeText('You have chosen the option Option 2. Please submit your email below to cast your vote.');
    }

    // public function test_store_casted_vote()
    // {
    //     $response = $this
    //         ->post('/vote-cast', [
    //             'poll_id' => 1,
    //             'email' => 'example@yrgo.se',
    //             'vote_option_chosen' => 'vote_option_chosen'
    //         ]);

    //     $response->assertStatus(200);
    // }
}
