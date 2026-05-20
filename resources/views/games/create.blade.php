@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        ➕ Add New Game
    </h1>

    <!-- FORM -->
    <form method="POST"
          action="{{ route('game.store') }}"
          enctype="multipart/form-data"
          class="bg-white shadow rounded-xl p-6 space-y-5">

        @csrf

        <!-- TITLE -->
        <div>
            <label class="block font-semibold mb-1">Game Title</label>
            <input type="text" name="title"
                   class="w-full border p-2 rounded"
                   placeholder="e.g. Valorant"
                   required>
        </div>

        <!-- PLATFORM -->
        <div>
            <label class="block font-semibold mb-1">Platform</label>
            <input type="text" name="platform"
                   class="w-full border p-2 rounded"
                   placeholder="PC / PS5 / Xbox"
                   required>
        </div>

        <!-- RATING -->
        <div>
            <label class="block font-semibold mb-1">Rating (0 - 10)</label>
            <input type="number" name="rating"
                   min="0" max="10" step="0.1"
                   class="w-full border p-2 rounded"
                   placeholder="8.5"
                   required>
        </div>

        <!-- GENRE -->
        <div>
            <label class="block font-semibold mb-1">Genre</label>
            <select name="genre_id" class="w-full border p-2 rounded" required>
                <option value="">Select Genre</option>

                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">
                        {{ $genre->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- IMAGE -->
        <div>
            <label class="block font-semibold mb-1">Game Image</label>
            <input type="file" name="image"
                   class="w-full border p-2 rounded"
                   accept="image/*"
                   required>
        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg w-full font-semibold">
            Save Game
        </button>

    </form>

</div>
@endsection