<?php
use App\Http\Controllers\GenreController;

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('games.index');
// });


// Homepage
Route::get('/', [GameController::class, 'home'])->name('home');

// All games
Route::get('/games', [GameController::class, 'index'])->name('games.index');

// Single game (detail page)
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

// Genre page (all games in that genre)
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');