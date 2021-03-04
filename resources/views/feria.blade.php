@extends('layout')

@section('opciones')
    <x-layout.nav>
        @isset($msj)
            <div class="text-2xl text-blue-800">{{$msj}}
        @endisset
    </x-layout.nav>
@endsection

@section('contenido')
    <x-layout.main>
        <div class="grid grid-cols-12 grid-rows-6 gap-2 p-2">
            @for($n=0; $n<72; $n++)
                <div class="bg-yellow-500 p-1">{{$n}}</div>
            @endfor
        </div>
    </x-layout.main>
@endsection
