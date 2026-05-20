@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        ✏️ Edit Game
    </h1>

    <form method="POST"
          action="{{ route('game.update', $game->id) }}"
          enctype="multipart/form-data"
          class="bg-white shadow rounded-xl p-6 space-y-5">

        @csrf
        @method('PUT')

        <!-- TITLE -->
        <div>
            <label class="block font-semibold mb-1">Game Title</label>
            <input type="text" name="title"
                   value="{{ $game->title }}"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        <!-- PLATFORM -->
        <div>
            <label class="block font-semibold mb-1">Platform</label>
            <input type="text" name="platform"
                   value="{{ $game->platform }}"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        <!-- RATING -->
        <div>
            <label class="block font-semibold mb-1">Rating (0 - 10)</label>
            <input type="number" name="rating"
                   value="{{ $game->rating }}"
                   min="0" max="10" step="0.1"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        <!-- GENRE -->
        <div>
            <label class="block font-semibold mb-1">Genre</label>
            <select name="genre_id" class="w-full border p-2 rounded" required>

                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        {{ $game->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- CURRENT IMAGE -->
        <div>
            <label class="block font-semibold mb-1">Current Image</label>
            <img src="{{ asset('storage/' . $game->image) }}"
                 class="w-full h-48 object-cover rounded">
        </div>

        <!-- NEW IMAGE -->
        <div>
            <label class="block font-semibold mb-1">Change Image (optional)</label>
            <input type="file" name="image"
                   class="w-full border p-2 rounded"
                   accept="image/*">
        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded w-full font-semibold">
            Update Game
        </button>

    </form>

</div>

@endsection