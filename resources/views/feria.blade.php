@extends('layout')

@section('opciones')
    <x-layout.nav>
        @isset($msj)
            <div class="text-2xl text-white">{{$msj}}</div>
        @endisset
    </x-layout.nav>
@endsection

@section('contenido')
    <x-layout.main>

    </x-layout.main>
@endsection
