<?php

use Illuminate\Support\Facades\Route;

// Front page
Route::get('/', function () {
    return view('frontpage');
});

// Login page
Route::get('/login', function () {
    return view('login');
})->name('login');

// When user submits login — go to dashboard directly
Route::post('/login', function () {
    return redirect('/dashboard');
})->name('login.submit');

// Register page
Route::get('/register', function () {
    return view('register');
})->name('register');

// Dashboard (no auth required)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Profile pages (NO controller)
Route::get('/profile', function () {
    return view('profile');
})->name('profile.show');

Route::get('/profile/edit', function () {
    return view('profile-edit');
})->name('profile.edit');

Route::post('/profile/update', function () {
    // just return back for now
    return back()->with('success', 'Profile updated!');
})->name('profile.update');
