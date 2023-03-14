<?php

namespace Tests\Feature;

use App\Models\Poll;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PollTest extends TestCase
{

    use RefreshDatabase;

    public function test_create_poll(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this
            ->post('/polls', [
                'poll_title' => 'Test Poll',
                'poll_description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, non.',
                'date_closing' => '2023-05-05',
                'user_id' => $user->id,
                'no_of_allowed_votes' => 10,
                'vote_option_1' => 'First option',
                'vote_option_2' => 'Second option'
            ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_close_poll(): void
    {
        $user = User::factory()->create();
        $poll = Poll::factory()->create();

        $this->actingAs($user);

        $response = $this
            ->patch("/polls/{$poll->id}/closed");

        $response->assertRedirect('/dashboard');
        $response->assertStatus(302);
        $this->assertTrue($poll->poll_closed = true);
    }

    public function test_remove_poll(): void
    {
        $user = User::factory()->create();
        $poll = Poll::factory()->create();

        $this->actingAs($user);

        $response = $this
            ->delete("/poll/{$poll->id}/removed");

        $response->assertRedirect('/dashboard-completed-polls');
        $this->assertModelMissing($poll);
    }
}
