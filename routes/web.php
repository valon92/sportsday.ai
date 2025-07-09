<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rruga për faqen Home
Route::get('/', function () {
    return Inertia::render('Home');
});

// Rrugë placeholder për faqet e tjera (do t'i zhvillojmë më vonë)
Route::get('/reels', function () {
    return Inertia::render('Reels');
});

Route::get('/results', function () {
    return Inertia::render('Results');
});

Route::get('/news', function () {
    return Inertia::render('News');
});

// Rrugë për Login dhe Register (do të përdorin komponentët e Vue)
Route::get('/login', function () {
    return Inertia::render('Auth/Login'); // Ose thjesht 'Login' nese komponenti eshte direkt ne Pages
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Auth/Register'); // Ose thjesht 'Register'
})->name('register');