@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <!-- TOP BAR -->
    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold">
            🎮 All Games
        </h1>

        <!-- BIG ADD BUTTON -->
        <a href="{{ route('game.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg text-lg font-semibold shadow">
            + Add Game
        </a>

    </div>

    <h1 class="text-3xl font-bold mb-6 text-center">🎮 Dashboard Games</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

@foreach ($games as $game)

    <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">

        <!-- IMAGE -->
        <img 
            src="{{ asset('storage/' . $game->image) }}"
            alt="{{ $game->title }}"
            class="w-full h-48 object-cover"
        >

        <!-- CONTENT -->
        <div class="p-4">

            <h2 class="font-semibold text-lg">
                {{ $game->title }}
            </h2>

            <p>⭐ {{ $game->rating }}/10</p>
            <p class="text-gray-500">{{ $game->platform }}</p>

            <!-- BUTTONS -->
            <div class="mt-4 flex gap-2">

                <!-- EDIT -->
                <a href="{{ route('game.edit', $game->id) }}"
                   class="text-xs bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded">
                    Edit
                </a>

                <!-- DELETE -->
                <form method="POST"
                      action="{{ route('game.destroy', $game->id) }}"
                      onsubmit="return confirm('⚠️ Are you sure you want to delete this game? This cannot be undone!')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="text-xs bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                        Delete
                    </button>

                </form>

            </div>

        </div>

    </div>

@endforeach

</div>
</div>
@endsection