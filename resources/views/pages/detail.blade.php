@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- BIG IMAGE -->
        <div>
            <img 
                src="{{ asset('storage/'.$game->image) }}" 
                alt="{{ $game->title }}" 
                class="w-full h-[400px] object-cover rounded-lg shadow"
            >
        </div>

        <!-- GAME INFO -->
        <div class="flex flex-col justify-center">

            <h1 class="text-4xl font-bold mb-4">
                {{ $game->title }}
            </h1>

            <p class="text-lg mb-2">
                🎯 Genre: 
                <span class="font-semibold">
                    {{ $game->genre->name ?? 'Unknown' }}
                </span>
            </p>

            <p class="text-lg mb-2">
                🎮 Platform: 
                <span class="font-semibold">
                    {{ $game->platform }}
                </span>
            </p>

            <p class="text-lg mb-6">
                ⭐ Rating: 
                <span class="font-semibold">
                    {{ $game->rating }}/10
                </span>
            </p>

            <!-- BACK BUTTON -->
            <a href="{{ route('games.index') }}"
               class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 w-fit">
               ← Back to Games
            </a>

        </div>

    </div>

</div>

@endsection