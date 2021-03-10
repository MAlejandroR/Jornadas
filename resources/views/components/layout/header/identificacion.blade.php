@if (Route::has('login'))
    <div class="flex flex-row justify-around p-2 items-center text-pink-500">
        @auth
            {{auth()->user()->name}}
            <form action="{{route('logout')}}" method="POST">
                @csrf

                <button class="invisible md:visible  text-xl text-enlaces"> {{__('logout')}}</button>
                <img class="visible md:invisible" type="submit" src="{{"icon/login.png"}}">
            </form>

        @else
            <a href="{{ route('login') }}" class=" hidden md:block  text-xl text-green-100  ">{{__("Login")}}</a>
            <a href="{{ route('login') }}" class=" block md:hidden ">
                <img class="w-1/4 h:1/5 " src="{{asset('storage/icon/login.png')}}" alt="{{__("Login")}}">
            </a>


{{--            @if (Route::has('register'))--}}
{{--                <a href="{{ route('register') }}" class="ml-4 text-xl text-green-100 ">{{__("Register")}}</a>--}}
{{--            @endif--}}
        @endauth
    </div>
@endif
