<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct(public AuthService $authService)
    {

    }

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);


        $this->authService->login($data);

        return redirect()->intended('/profile');
    }

    public function destroy(Request $request)
    {
        $this->authService->logout();

        return redirect()->route('auth.login');

    }


}
