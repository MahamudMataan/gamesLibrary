<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * HOME PAGE
     */
    public function home()
    {
        $topGames = Game::orderBy('rating', 'desc')->take(6)->get();
        $latestGames = Game::latest()->take(6)->get();

        $topGenres = Genre::withCount('games')
            ->orderBy('games_count', 'desc')
            ->take(3)
            ->get();

        return view('pages.home', compact('topGames', 'latestGames', 'topGenres'));
    }

    /**
     * ALL GAMES PAGE
     */
    public function index()
    {
        $games = Game::latest()->get();
        $genres = Genre::all();

        return view('pages.games', compact('games', 'genres'));
    }

    /**
     * DASHBOARD PAGE
     */
    public function dashboard()
    {
        $games = Game::latest()->get();

        return view('dashboard', compact('games'));
    }

    /**
     * SHOW CREATE FORM
     */
    public function create()
    {
        $genres = Genre::all();

        return view('games.create', compact('genres'));
    }

    /**
     * STORE GAME
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:games,title',
            'platform' => 'required',
            'rating' => 'required|numeric',
            'genre_id' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('games', 'public');

        Game::create([
            'title' => $request->title,
            'platform' => $request->platform,
            'rating' => $request->rating,
            'genre_id' => $request->genre_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Game added successfully!');
    }

    /**
     * SHOW SINGLE GAME
     */
    public function show(Game $game)
    {
        return view('pages.detail', compact('game'));
    }

    /**
     * SHOW EDIT FORM
     */
    public function edit(Game $game)
    {
        $genres = Genre::all();

        return view('games.edit', compact('game', 'genres'));
    }

    /**
     * UPDATE GAME
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required',
            'platform' => 'required',
            'rating' => 'required|numeric',
            'genre_id' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $game->image = $request->file('image')->store('games', 'public');
        }

        $game->update([
            'title' => $request->title,
            'platform' => $request->platform,
            'rating' => $request->rating,
            'genre_id' => $request->genre_id,
            'image' => $game->image,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Game updated successfully!');
    }

    /**
     * DELETE GAME
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Game deleted successfully!');
    }
};