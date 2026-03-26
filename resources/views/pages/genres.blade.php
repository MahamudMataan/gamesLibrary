@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-10">

    <!-- Genre title -->
    <h1 class="text-4xl font-bold mb-8">
        🎯 {{ $genre->name }} Games
    </h1>

    <!-- Games grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach ($genre->games as $game)
            <a href="{{ route('games.show', $game->id) }}">
                <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition">

                    <img 
                        src="{{ asset('storage/games/'.$game->image) }}" 
                        alt="{{ $game->title }}" 
                        class="w-full h-48 object-cover rounded mb-2"
                    >

                    <h2 class="font-semibold text-lg">{{ $game->title }}</h2>
                    <p>⭐ {{ $game->rating }}/10</p>
                    <p class="text-gray-500">{{ $game->platform }}</p>

                </div>
            </a>
        @endforeach

    </div>

</div>

@endsection