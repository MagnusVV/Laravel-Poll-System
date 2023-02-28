<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, ['user_name', 'email', 'password']);

        $newUser = $request->only('user_name', 'email', 'password');

        User::create(['user_name' => $newUser['user_name'], 'email' => $newUser['email'], 'password' => Hash::make($newUser['password'])]);

        return back()->with('message', 'User registered succesfully!');
    }
}
