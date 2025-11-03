<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show signup form
    public function showSignupForm()
    {
        return view('signup');
    }

    // Handle signup form
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home')->with('success', 'Signup successful! Please login.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login form
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('main');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
