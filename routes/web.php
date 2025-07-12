<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
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

// Public Routes (Accessible to all users, authenticated or guests)
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/sports', function () {
    return Inertia::render('Sports');
})->name('sports');

Route::get('/reels', function () {
    return Inertia::render('Reels');
})->name('reels');

Route::get('/results', function () {
    return Inertia::render('Results');
})->name('results');

Route::get('/news', function () {
    return Inertia::render('News');
})->name('news');

Route::get('/teams', function () {
    return Inertia::render('Teams');
})->name('teams');

Route::get('/players', function () {
    return Inertia::render('Players');
})->name('players');

Route::get('/transfer', function () {
    return Inertia::render('Transfer');
})->name('transfer');

Route::get('/calendar', function () {
    return Inertia::render('Calendar');
})->name('calendar');


// Këto rrugë (login/register) zakonisht menaxhohen nga Laravel Breeze.
// Për momentin, po i lëmë të komentuar ose të menaxhuara manualisht
// nëse nuk përdorim Breeze.
Route::get('/login', function () {
    return Inertia::render('Login'); // Sigurohuni që kjo Vue page ekziston
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Register'); // Sigurohuni që kjo Vue page ekziston
})->name('register');


// Authenticated Routes (Accessible only to logged-in and verified users)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Route (Standard for Laravel Breeze after login)
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Profile Routes (Managed by ProfileController from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Settings Routes Group
    Route::prefix('settings')->name('settings.')->group(function () {
        // Default /settings route: Redirect to profile.edit or a dedicated settings index page
        Route::get('/', function () {
            return redirect()->route('profile.edit');
        })->name('index');

        Route::get('/preferences', function () {
            return Inertia::render('Settings/Preferences');
        })->name('preferences');

        Route::get('/security', function () {
            return Inertia::render('Settings/Security');
        })->name('security');

        Route::get('/privacy', function () {
            return Inertia::render('Settings/Privacy');
        })->name('privacy');
    });
});

// *****************************************************************
// Rregullim: Komentojmë ose heqim rreshtin e mëposhtëm
// nëse nuk e keni instaluar Laravel Breeze ose ai skedar nuk ekziston.
// Kjo është shkaku i gabimit "Failed to open stream: No such file or directory".
// *****************************************************************
// require __DIR__.'/auth.php'; // Këtë rresht komentojeni ose fshijeni për momentin