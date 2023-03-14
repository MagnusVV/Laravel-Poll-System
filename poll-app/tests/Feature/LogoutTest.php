<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/logout');
        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
