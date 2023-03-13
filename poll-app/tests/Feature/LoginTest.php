<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/login-user');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $user = new User();
        $user->user_name = 'Rune';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('/login-user', [
                'email' => 'example@yrgo.se',
                'password' => '123',
            ]);

        $response->assertSeeText('Hello, Rune!');
    }

    public function test_login_user_without_password()
    {
        $response = $this
            ->followingRedirects()
            ->post('/login-user', [
                'email' => 'example@yrgo.se',
            ]);

        $response->assertSeeText('We are deeply sorry, but something went wrong. Please try again.');
    }
}
