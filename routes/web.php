<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;





Route::resource('game',GameController::class);// Homepage

Route::get('/', [GameController::class, 'home'])->name('home');

// All games
Route::get('/games', [GameController::class, 'index'])->name('games.index');

// Single game (detail page)
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

// Genre page (all games in that genre)
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [GameController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
