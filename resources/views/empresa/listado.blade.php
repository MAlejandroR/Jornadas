{{--@extends("layout")--}}

{{--@section('opciones')--}}
{{--    <x-form.a-href href="{{route('feria')}}">--}}
{{--        Volver--}}
{{--    </x-form.a-href>--}}
{{--@endsection--}}

{{--@section('contenido')--}}
{{--    <x-layout.main>--}}

{{--        @empty($listado_empresas)--}}
{{--            <h1 class="text-yellow-800 text-3xl">Actualmente no hay empresas insertadas</h1>--}}
{{--        @endempty--}}
{{--        @isset($listado_empresas)--}}
{{--                <table class="max-w-full divide-y divide-gray-200 m-5">--}}
{{--                <table class="max-w-full divide-y divide-gray-200 m-5">--}}
{{--                    <thead class="bg-gray-50">--}}
{{--                    <tr>--}}
{{--                        <x-form.th>Empresa</x-form.th>--}}
{{--                        <x-form.th>Ponente</x-form.th>--}}
{{--                        <x-form.th>Editar</x-form.th>--}}
{{--                        <x-form.th>Eliminar</x-form.th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody class="bg-white divide-y divide-gray-200 h-70v overflow-y-auto">--}}
{{--                    @foreach($listado_empresas as $empresa)--}}
{{--                        <tr>--}}
{{--                            --}}{{--                            {{dd ($listado_empresas)}}--}}
{{--                            <x-form.td>--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <div class="flex-shrink-0 h-10 w-10">--}}
{{--                                        <img class="h-10 w-10 rounded-full"--}}
{{--                                             src="{{asset("storage/logos/{$empresa['empresa']->logo}")}}">--}}
{{--                                    </div>--}}
{{--                                    <div class="ml-4">--}}
{{--                                        <div class="text-sm font-medium text-gray-900">--}}
{{--                                            {{$empresa['empresa']->empresa}}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </x-form.td>--}}
{{--                            <x-form.td>{{$empresa['empresa']->ponente}}</x-form.td>--}}
{{--                            <x-form.td class=" text-right text-sm font-medium">--}}
{{--                                <a href="{{route("empresas.edit",[$empresa['empresa']])}}"--}}
{{--                                   class="text-indigo-600 hover:text-indigo-900"><img class="w-8 h-8"--}}
{{--                                                                                      src="{{asset("images/editar.png")}}"></a>--}}
{{--                            </x-form.td>--}}
{{--                            <x-form.td>--}}
{{--                                <form action="{{route('empresas.destroy', [$empresa['empresa']])}}" method="post">--}}
{{--                                    @method("delete")--}}
{{--                                    @csrf--}}
{{--                                    <input type="image" src="{{asset("images/borrar2.jpg")}}"--}}
{{--                                           class=" w-8 h-8 text-indigo-600 hover:text-indigo-900"/>--}}
{{--                                </form>--}}
{{--                            </x-form.td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}



{{--            --}}{{--           --}}
{{--            --}}{{--                <h1 class="text-yellow-800 text-3xl"> DAtos de nueva empresa</h1>--}}
{{--            --}}{{--                <hr/>--}}
{{--            --}}{{--                <h1>Empresa {{$empresa['empresa']->empresa}}'</h1>--}}
{{--            --}}{{--                <h2>Descripcion {{$empresa['empresa']->descripcion}}'</h2>--}}
{{--            --}}{{--                <h2>Ponente {{$empresa['empresa']->ponente}}</h2>--}}
{{--            --}}{{--                <h2>Horario{{$empresa['empresa']->horario}}</h2>--}}
{{--            --}}{{--                <h2>Dureción {{$empresa['empresa']->duracion}}</h2>--}}
{{--            --}}{{--                <h2>Enlace{{$empresa['empresa']->enlace}} </h2>--}}
{{--            --}}{{--                <h2>Logo {{$empresa['empresa']->logo}}</h2>--}}
{{--            --}}{{--                @foreach ($empresa as $ciclos)--}}

{{--            --}}{{--                    @if (isset($ciclos->empresa))--}}
{{--            --}}{{--                        <h1>hola</h1>--}}
{{--            --}}{{--                        @continue--}}
{{--            --}}{{--                    @endif--}}

{{--            --}}{{--                            {{dd($ciclos)}}--}}
{{--            --}}{{--                    <h3>Familia profesiona {{$ciclos['ciclo']['familia']}}</h3>--}}
{{--            --}}{{--                    <h3>Ciclo {{$ciclos['ciclo']['nombre']}}</h3>--}}
{{--            --}}{{--                    <hr/>--}}
{{--            --}}{{--                @endforeach--}}
{{--            --}}{{--            @endforeach--}}
{{--        @endisset--}}
{{--    </x-layout.main>--}}
{{--@endsection--}}



@extends("layout")

@section('opciones')
    <x-form.a-href href="{{route('feria')}}">
        Volver
    </x-form.a-href>
@endsection

@section('contenido')



        @empty($empresas)
            <h1 class="text-yellow-800 text-3xl">Actualmente no hay empresas insertadas</h1>
        @endempty
        @isset($empresas)

                <table class="max-w-full divide-y divide-gray-200 m-5">
                <table class="max-w-full divide-y divide-gray-200 m-5">
                    <thead class="bg-gray-50">
                    <tr>
                        <x-form.th>Empresa</x-form.th>
                        <x-form.th>Ponente</x-form.th>
                        <x-form.th>Editar</x-form.th>
                        <x-form.th>Eliminar</x-form.th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 h-70v overflow-y-auto">
                    @foreach($empresas as $empresa)
                        <tr>
                            {{--                            {{dd ($listado_empresas)}}--}}
                            <x-form.td>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-5 w-5">
                                        <img class="h-5 w-5 rounded-full"
                                             src="{{asset("storage/logos/{$empresa->logo}")}}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$empresa->empresa}}
                                        </div>
                                    </div>
                                </div>
                            </x-form.td>
                            <x-form.td>{{$empresa->ponente}}</x-form.td>
                            <x-form.td class=" text-right text-sm font-medium">
                                <a href="{{route("empresas.edit",[$empresa])}}"
                                   class="text-indigo-600 hover:text-indigo-900"><img class="w-8 h-8"
                                                                                      src="{{asset("images/editar.png")}}"></a>
                            </x-form.td>
                            <x-form.td>
                                <form action="{{route('empresas.destroy', [$empresa])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <input type="image" src="{{asset("images/borrar2.jpg")}}"
                                           class=" w-8 h-8 text-indigo-600 hover:text-indigo-900"/>
                                </form>
                            </x-form.td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>




            {{--           --}}
            {{--                <h1 class="text-yellow-800 text-3xl"> DAtos de nueva empresa</h1>--}}
            {{--                <hr/>--}}
            {{--                <h1>Empresa {{$empresa['empresa']->empresa}}'</h1>--}}
            {{--                <h2>Descripcion {{$empresa['empresa']->descripcion}}'</h2>--}}
            {{--                <h2>Ponente {{$empresa['empresa']->ponente}}</h2>--}}
            {{--                <h2>Horario{{$empresa['empresa']->horario}}</h2>--}}
            {{--                <h2>Dureción {{$empresa['empresa']->duracion}}</h2>--}}
            {{--                <h2>Enlace{{$empresa['empresa']->enlace}} </h2>--}}
            {{--                <h2>Logo {{$empresa['empresa']->logo}}</h2>--}}
            {{--                @foreach ($empresa as $ciclos)--}}

            {{--                    @if (isset($ciclos->empresa))--}}
            {{--                        <h1>hola</h1>--}}
            {{--                        @continue--}}
            {{--                    @endif--}}

            {{--                            {{dd($ciclos)}}--}}
            {{--                    <h3>Familia profesiona {{$ciclos['ciclo']['familia']}}</h3>--}}
            {{--                    <h3>Ciclo {{$ciclos['ciclo']['nombre']}}</h3>--}}
            {{--                    <hr/>--}}
            {{--                @endforeach--}}
            {{--            @endforeach--}}
        @endisset



@endsection





