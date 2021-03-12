@extends("layout")




@section("contenido")
    <form action={{route('empresas.store')}} enctype="multipart/form-data" method='POST' id="form"
          class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <div class="bg-yellow-600 flex flex-row">
                <x-form.button>Guardar datos</x-form.button>
                <x-form.a-href href="{{route('feria')}}">Cancelar</x-form.a-href>

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
                    value="CPI FP Los Enlaces"
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
El Centro Público Integrado de Formación Profesional Los Enlaces comenzó a funcionar como instituto en el curso 1985-86. Su puesta en marcha responde a la preocupación de la Administración por expandir este tipo de enseñanzas en Zaragoza y coincide con la apertura de otros centros de Formación Profesional en la ciudad.
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
                    value="Alumudena Hidalgo"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="ponente" id="ponente" type="text" placeholder="Ponente" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Date">
                Hora comienzo
            </label>
            <input
                    value="10:10"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="horario" id="date" type="time" placeholder="Hora de comienzo" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="duracion">
                Duración
            </label>
            <input
                    value="120"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="duracion" id="date" type="number" placeholder="Duración en minutos" required>
        </div>
        <div class="flex flex-col justify-center border-purple-900  w-full p-6
                    border-pink-700 rounded-3xl">
            <label class="border border-pink-900 rounded-2xl p-4 text-xl" for="familia">Familias profesionales
                @foreach($ciclos as $index=> $ciclo)
                    <div class=" flex flex-row text-1xl mt-10 pl-10">
                        <input type="checkbox" id="familia" name="familia[]" value="{{$ciclo->familia}}"
                               class="py-1  text-{{$ciclo->color}}-800 "
                               color={{$index}}>
                        <span class="ml-3 text-{{$ciclo->color}}-800">{{$ciclo->familia}}</span>
                    </div>
                @endforeach
            </label>
        </div>
        <label class="p-4 text-xl" for="familia">Ciclo/s a los que va dirigido </label>

        <div id='ciclo' class="border border-pink-900 rounded-2xl">
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
        // Llamada ajax para recuperar los ciclos de una familia que acabo de clicar
        // O bien para anunlar dichos ciclos si lo he deselecccionado
        // Retornará el html con el select-option con un listado de los ciclo de cada familia
        // Pendiente pasar a vue
        $("#form input[type=checkbox]").click( function () {
            var ciclos =[] ;
            // console.log("estoy por aquí ");
            $("input:checkbox:checked").each(function () {
                ciclos.push($(this).val());
                // console.log("Cargando un elemento en el array "+$(this).val());
            });
            $.ajax({
                url: "{{ route('ciclos.get_by_family')}}",
                method: 'POST',
                data :{'_token': "{{csrf_token()}}",'familias':ciclos},
                success: function (data) {
                    $('#ciclo').html(data.html);
                }
            });
        });

    </script>
@endsection

