@if (Route::has('login'))
    <div class="flex flex-row justify-around p-2 items-center text-pink-500">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-enlaces underline">Logueado</a>
        @else
            <a href="{{ route('login1') }}" class="text-xl text-green-100  ">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-xl text-green-100 ">Register</a>
            @endif
        @endauth
    </div>
@endif
