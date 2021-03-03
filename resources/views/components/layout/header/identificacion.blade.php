@if (Route::has('login'))
    <div class="flex flex-row justify-around p-2 items-center text-pink-500">
        @auth
            {{auth()->user()->name}}
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="text-xl text-enlaces"> {{__('logout')}}</button>
            </form>

        @else
            <a href="{{ route('login') }}" class="text-xl text-green-100  ">{{__("Login")}}</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-xl text-green-100 ">{{__("Register")}}</a>
            @endif
        @endauth
    </div>
@endif
