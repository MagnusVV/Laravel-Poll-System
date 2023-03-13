<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class PollTest extends TestCase
{

    use RefreshDatabase;

    public function test_create_poll(): void
    {
        $user = new User();
        $user->user_name = 'Rune';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $this->actingAs($user);

        $response = $this
            ->post('/polls', [
                'poll_title' => 'Test Poll',
                'poll_description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, non.',
                'date_closing' => '2023-05-05',
                'user_id' => Auth::id(),
                'no_of_allowed_votes' => 10,
                'vote_option_1' => 'First option',
                'vote_option_2' => 'Second option'
            ]);

        $response->assertRedirect('/dashboard');
    }
}
