<header class="bg-white border-b">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">

    <!-- Logo -->
    <div class="flex lg:flex-1">
      <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" class="h-8 w-auto" />
      </a>
    </div>

    <!-- Links -->
    <div class="hidden lg:flex lg:gap-x-12">
      <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-900">Home</a>
      <a href="{{ route('games.index') }}" class="text-sm font-semibold text-gray-900">Games</a>
      <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-gray-900">Dashboard</a>
    </div>

    <!-- RIGHT SIDE (AUTH) -->
    <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-4">

      @auth
        <!-- Name -->
        <span class="text-sm font-semibold text-gray-900">
          {{ auth()->user()->name }}
        </span>

        <!-- Profile -->
        <a href="{{ route('profile.edit') }}" class="text-sm font-semibold text-indigo-600">
          Profile
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="text-sm font-semibold text-red-600">
            Logout
          </button>
        </form>
      @endauth

      @guest
        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900">
          Log in →
        </a>

        <a href="{{ route('register') }}" class="text-sm font-semibold text-indigo-600">
          Register
        </a>
      @endguest

    </div>

  </nav>
</header>