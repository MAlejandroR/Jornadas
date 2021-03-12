@if (Route::has('login'))
    <div class="flex flex-row justify-around p-2 items-center text-white">
        @auth
<div class="flex flex-col justify-start">
            Administrador {{auth()->user()->name}}

            <form action="{{route('logout')}}" method="POST">
                @csrf

                <button class=" text-xl text-white  rounded border border-white p-1 bg-fondo"> {{__('logout')}}</button>
                <img class="visible md:invisible" type="submit" src="{{"icon/login.png"}}">
            </form>
</div>
        @else
            <a href="{{ route('login') }}" class=" hidden md:block  text-xl
    2xl
     bg-fondo
       font-semibold border
        border-red-600 rounded hover:bg-red-600
         hover:text-white
          hover:border-transparent
          transition
          ease-in duration-200
           transform hover:-translate-y-1
            active:translate-y-0
">{{__("Login")}}</a>
            <a href="{{ route('login') }}" class=" block md:hidden ">
                <img class="w-1/4 h:1/5 " src="{{asset('storage/icon/login.png')}}" alt="{{__("Login")}}">
            </a>


{{--            @if (Route::has('register'))--}}
{{--                <a href="{{ route('register') }}" class="ml-4 text-xl text-green-100 ">{{__("Register")}}</a>--}}
{{--            @endif--}}
        @endauth
    </div>
@endif
