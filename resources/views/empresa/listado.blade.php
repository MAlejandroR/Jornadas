@extends("layout")
{{--{{dd($listado_empresas)}}--}}

@foreach($listado_empresas as $empresa)
    <h1 class="text-yellow-800 text-3xl"> DAtos de nueva empresa</h1>
    <hr />
    <h1>Empresa {{$empresa['empresa']->empresa}}'</h1>
    <h2>Descripcion {{$empresa['empresa']->descripcion}}'</h2>
    <h2>Ponente {{$empresa['empresa']->ponente}}</h2>
    <h2>Horario{{$empresa['empresa']->horario}}</h2>
    <h2>Dureción {{$empresa['empresa']->duracion}}</h2>
    <h2>Enlace{{$empresa['empresa']->enlace}} </h2>
    <h2>Logo {{$empresa['empresa']->logo}}</h2>
    @foreach ($empresa as $ciclos)

        @if (isset($ciclos->empresa))
            <h1>hola</h1>
            @continue
        @endif

{{--        {{dd($ciclos)}}--}}
        <h3>Familia profesiona {{$ciclos['ciclo']['familia']}}</h3>
        <h3>Ciclo  {{$ciclos['ciclo']['nombre']}}</h3>
        <hr/>
    @endforeach
@endforeach





