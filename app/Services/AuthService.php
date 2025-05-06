<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function register(array $data)
    {

    }
    public function authenticate($email, $password, $remember)
    {
        if(Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return true;
        }
    }

    public function logout($user)
    {
        $user->remember_token = null;
        Auth::logout();
    }
}
