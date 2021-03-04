@extends("layout")
@section('contenido')
    <x-layout.main>
        <form action={{route('empresas.store')}} enctype="multipart/form-data" method='POST' id="form"
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <div class="bg-yellow-600 flex flex-row">
                <x-form.button>Guardar datos</x-form.button>
                <a href="{{route("feria")}}" class='inline-flex
                                                    items-center
                                    px-4
                                    py-2
                                    bg-red-800
                                    border
                                    border-transparent
                                    rounded-md
                                    font-semibold
                                    text-xs
                                    text-white
                                    uppercase
                                    tracking-widest
                                    hover:bg-gray-700
                                    active:bg-gray-900
                                    focus:outline-none
                                    focus:border-gray-900
                                    focus:ring
                                    ring-gray-300
                                    disabled:opacity-25
                                    transition ease-in-out duration-150 m-2 w-1/4'>Cancelar</a>
            </div>


            @csrf
            {{--        <div><img src="img/logo-ghooa.png" width="40%"></div>--}}
            <br>
            <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">Datos de empresa</h1>
            <br>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="empresa">
                    Empresa
                </label>
                <input
                        value="{{$datos_empresa['empresa']->empresa}}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="empresa" id="name" type="text" placeholder="Nombre de empresa" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                    Descripción
                </label>

                <textarea
                        name="descripcion" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                        rows="4">
                    {{$datos_empresa['empresa']->descripcion}}

            </textarea>

                {{--            <input--}}
                {{--                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
                {{--                name="tel" id="tel" type="tex" placeholder="Descripción de empresa" required>--}}
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ponente">
                    Ponente
                </label>
                <input
                        value="{{$datos_empresa['empresa']->ponente}}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="ponente" id="ponente" type="text" placeholder="Ponente" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Date">
                    Hora comienzo
                </label>
                <input
                        value="{{$datos_empresa['empresa']->horario}}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="horario" id="date" type="time" placeholder="Hora de comienzo" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="duracion">
                    Duración
                </label>
                <input
                        value="{{$datos_empresa['empresa']->duracion}}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="duracion" id="date" type="number" placeholder="Duración en minutos" required>
            </div>
            <div class="flex flex-col justify-center border-purple-900  w-1/4 p-6
                    border-pink-700 rounded-3xl">
                <label class="border-pink-900 rounded-4 text-3xl" for="familia">Familias profesionales
                    @php
                        $colores=['red', 'green','blue'];
                        $n=0;
                    @endphp
{{--Familias--}}
                    @foreach($ciclos as $index=> $ciclo)
                        <div class="flex flex-row text-2xl">
                            @php
                                $checked=""
                            @endphp
                            @foreach($datos_empresa['ciclo'] as $ciclo_empresa)
                                @if ($ciclo->familia == $ciclo_empresa['familia'])
                                    @php
                                        $checked="checked"
                                    @endphp
                                @endif
                            @endforeach


                            <input type="checkbox" id="familia" name="familia[]" value="{{$ciclo->familia}}"
                                   class="py-1"
                                   color={{$index}}>
                            <span class="ml-3 text-{{$colores[$index]}}-800">{{$ciclo->familia}}</span>
                        </div>
                    @endforeach
                </label>
            </div>

            <label class="block text-gray-700 text-sm font-bold mb-2" for="ciclo">
                Ciclo al que va dirigido
            </label>

            <div id='ciclo'>
                {{--            Falta implementar esta parte--}}
                <h2>Para mostrar ciclos, selecciona una familia</h2>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="enlace">
                    Enlace
                </label>
                <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="enlace" id="date" type="text" placeholder="Enlace de la charla" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="enlace">
                    Logo
                </label>
                <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="logo" id="date" type="file" placeholder="Logo" required>
            </div>
            <x-form.button> Guardar datos</x-form.button>
        </form>


        @endsection
        @section('script')
            <script type="text/javascript">
                $("#form input[type=checkbox]").click(function () {
                    var ciclos = [];
                    $("input:checkbox:checked").each(function () {
                        ciclos.push($(this).val() + "-" + $(this).attr('color'));
                    });
                    $.ajax({
                        url: "{{ route('ciclos.get_by_family')}}?familia=" + ciclos,
                        method: 'GET',
                        success: function (data) {
                            $('#ciclo').html(data.html);
                        }
                    });
                });

            </script>


    </x-layout.main>
@endsection



