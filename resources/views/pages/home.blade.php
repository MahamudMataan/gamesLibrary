@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">

    {{-- Top 3 Genres --}}
    <h1 class="text-3xl font-bold mt-12 mb-6 text-center">🎯 Top Genres</h1>
    <div class="grid grid-cols-3 gap-2">
        @foreach ($topGenres as $genre)
            <a href="{{ route('genres.show', $genre->id) }}"
               class="bg-indigo-100 px-4 py-2 rounded text-center font-semibold text-sm hover:bg-indigo-200 transition">
               {{ $genre->name }} ({{ $genre->games_count }})
            </a>
        @endforeach
    </div>

    {{-- Top Rated Games --}}
    <h1 class="text-3xl font-bold mt-12 mb-6">🔥 Top Rated Games</h1>
    <div class="grid grid-cols-3 gap-2">
        @foreach ($topGames as $game)
            <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                
                <img 
                    src="{{ asset('storage/'.$game->image) }}" 
                    alt="{{ $game->title }}" 
                    class="w-full h-48 object-cover"
                >

                <div class="p-3">
                    <h2 class="font-semibold text-sm truncate">{{ $game->title }}</h2>
                    <p class="text-xs">⭐ {{ $game->rating }}/10</p>
                    <p class="text-xs text-gray-500">{{ $game->platform }}</p>
                </div>

            </div>
        @endforeach
    </div>

    {{-- Latest Games --}}
    <h1 class="text-3xl font-bold mt-12 mb-6">🆕 Latest Games</h1>
    <div class="grid grid-cols-3 gap-2">
        @foreach ($latestGames as $game)
            <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">

                <img 
                    src="{{ asset('storage/'.$game->image) }}" 
                    alt="{{ $game->title }}" 
                    class="w-full h-48 object-cover"
                >

                <div class="p-3">
                    <h2 class="font-semibold text-sm truncate">{{ $game->title }}</h2>
                    <p class="text-xs">⭐ {{ $game->rating }}/10</p>
                    <p class="text-xs text-gray-500">{{ $game->platform }}</p>
                </div>

            </div>
        @endforeach
    </div>

</div>

@endsection