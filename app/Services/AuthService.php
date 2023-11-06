<?php

namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login($data)
    {
        if (!Auth::attempt($data, true)) {
            throw ValidationException::withMessages([
                'email' => 'Authentication failed'
            ]);
        }

    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

    }
}