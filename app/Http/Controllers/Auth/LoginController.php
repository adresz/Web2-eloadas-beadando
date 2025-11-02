<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Login oldal mutatása
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Bejelentkezés feldolgozása
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/'); // vagy ahová akarod
        }

        return back()->withErrors([
            'email' => 'Hibás email vagy jelszó.',
        ])->withInput();
    }

    // Kijelentkezés
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}