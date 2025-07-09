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

// Home Page
Route::get('/', function () {
    return Inertia::render('Home');
});

// Sports Pages
Route::get('/sports', function () {
    return Inertia::render('Sports');
});

Route::get('/reels', function () {
    return Inertia::render('Reels');
});

Route::get('/results', function () {
    return Inertia::render('Results');
});

Route::get('/news', function () {
    return Inertia::render('News');
});

Route::get('/teams', function () {
    return Inertia::render('Teams');
});

Route::get('/players', function () {
    return Inertia::render('Players');
});

Route::get('/transfer', function () {
    return Inertia::render('Transfer');
});

Route::get('/calendar', function () {
    return Inertia::render('Calendar');
});

// Këtu mund të shtohen rrugët e Laravel-it për autentikim më vonë
// p.sh., Route::get('/login', ...), Route::get('/register', ...)