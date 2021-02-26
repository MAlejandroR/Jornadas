@extends("instituto.layout")

@section("navegacion")
    <button type="button"
            class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">
        Guardar
    </button>
@endsection
@section("contenido")
    <form action={{route('empresas.store')}} enctype="multipart/form-data" method='POST' id="form"
          class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="empresa" id="name" type="text" placeholder="Nombre de empresa" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                Descripción
            </label>
            <textarea name="descripcion" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                      rows="4">

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
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="ponente" id="ponente" type="text" placeholder="Ponente" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Date">
                Hora comienzo
            </label>
            <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="horario" id="date" type="time" placeholder="Hora de comienzo" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="duracion">
                Duración
            </label>
            <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="duracion" id="date" type="number" placeholder="Duración en minutos" required>
        </div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="ciclo">
            Familia profesional a la que va dirigido
        </label>
        <select onchange = 'getMensaje()' id='familia' name='familia' class="w-full border bg-white rounded px-3 py-2 outline-none ">
            <option class="py-1 2xl:focus-within:text-gray-100">Selecciona una familia</option>
            @foreach($ciclos as $ciclo)
                <option class="py-1">{{$ciclo->familia}}</option>
            @endforeach
        </select>

        <label class="block text-gray-700 text-sm font-bold mb-2" for="ciclo">
            Ciclo al que va dirigido
        </label>
        <div id='ciclo'>
            {{--            Falta implementar esta parte--}}
            <h2>Para mostrar ciclos, selecciona una familia</h2>
            {{--            <option class="py-1">Informática: DAW: Desarrollo Aplicaciones Web</option>--}}
            {{--            <option class="py-1">Informática: SMR: Sistema Multiusuario y en Red (ciclo medio)</option>--}}
            {{--            <option class="py-1">Informática: ASIR: Administración de Sistemas informáticos</option>--}}
            {{--            <option class="py-1">Informática: DAM Desarrollo de aplicaciones multiplataforma</option>--}}
            {{--            <option class="py-1">Comercio: Ciclo 1 de comercio</option>--}}
            {{--            <option class="py-1">Comercio: Ciclo 1 de comercio</option>--}}
            {{--            <option class="py-1">Comercio: Ciclo 1 de comercio</option>--}}
            {{--            <option class="py-1">Imagen:Ciclo 1 de imagen</option>--}}
            {{--            <option class="py-1">Imagen:Ciclo 2 de imagen</option>--}}
            {{--            <option class="py-1">Imagen:Ciclo 3 de imagen</option>--}}
            {{--        </select>--}}
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

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        function getMensaje(){
            // alert ("HOla desde get mensaje");
            alert ("ahora tengo ").$(this).val();
        }
        $("#familia").change(function () {
            alert("hola caracola");
            // alert("Valor ").$(this).val()
            {{--$.ajax({--}}
            {{--    url: "{{ route('ajax.get_ciclos') }}?familia=" + $(this).val(),--}}
            {{--    data:'_token = <?php echo csrf_token() ?>',--}}

            {{--    method: 'GET',--}}
            {{--    success: function (data) {--}}
            {{--        $('#ciclo').html(data.html);--}}
            {{--    }--}}
            {{--});--}}
        });
    </script>
@endsection


