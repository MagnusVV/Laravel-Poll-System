<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VoteTest extends TestCase
{

    use RefreshDatabase;

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
