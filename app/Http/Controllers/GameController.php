<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Genre;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
        $genres = Genre::all();
        $games = Game::all();
        return view('pages.games', compact('games', 'genres'));

    }
    

    public function home()
    {
        // Top 6 rated games
        $topGames = Game::orderBy('rating', 'desc')->take(6)->get();

        // Latest 6 games
        $latestGames = Game::latest()->take(6)->get();

        // Top 3 genres based on number of games
        $topGenres = Genre::withCount('games')
                          ->orderBy('games_count', 'desc')
                          ->take(3)
                          ->get();

        return view('pages.home', compact('topGames', 'latestGames', 'topGenres'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */public function show(Game $game)
    {
    return view('pages.detail', compact('game'));   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
