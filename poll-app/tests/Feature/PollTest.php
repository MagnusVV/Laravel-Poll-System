<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\VoteOption;
use Tests\TestCase;
use App\Models\Poll;

class PollTest extends TestCase
{

    public function test_create_poll(): void
    {

        $response = $this
            ->followingRedirects()
            ->post('/polls', [
                'poll_title' => 'Test Poll',
                'poll_description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, non.',
                'date_closing' => '2023-05-05',
                'user_id' => 1,
                'no_of_allowed_votes' => 10,
                'vote_option_1' => 'First option',
                'vote_option_2' => 'Second option'
            ]);

        $response->assertSeeText('Hello, Rune!');
    }
}
