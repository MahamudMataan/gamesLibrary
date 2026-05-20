<h1 class="text-3xl font-bold mb-6 text-center">🎮 All Games</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">

  @foreach ($games as $game)
    <a href="{{ route('games.show', $game->id) }}">
        <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">

            <img 
                src="{{ asset('storage/'.$game->image) }}" 
                alt="{{ $game->title }}" 
                class="w-full h-48 object-cover"
            >

            <div class="p-4">
                <h2 class="font-semibold text-lg">{{ $game->title }}</h2>
                <p>⭐ {{ $game->rating }}/10</p>
                <p class="text-gray-500">{{ $game->platform }}</p>
            </div>

        </div>
    </a>
  @endforeach

</div>