<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function __construct()
    {

    }

    public function getIdentifierType(string $identifier): string
    {
        return filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    }
    public function showLoginForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('auth.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $identifierType = $this->getIdentifierType($request->identifier);
        $auth = Auth::attempt([$identifierType => $request->identifier, 'password' => $request->password]);
        if ($auth) {
            return redirect()->route('dashboard.home');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('welcome');
    }
}
