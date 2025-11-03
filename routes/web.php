<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;

// Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Signup Routes
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Main Page
Route::get('/main', function () {
    return view('main');
})->name('main');

//logout

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');
