@extends("layout")


@section("opciones")
    <button type="button"
            class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">
        Guardar
    </button>
@endsection
@section("contenido")
    create.blade.php
    <form action={{route('ciclos.get_by_family')}} enctype="multipart/form-data" method='POST' id="form">
        @csrf

        <div class="flex flex-col justify-center bg-yellow-200  w-1/4 p-6
                    border-pink-700 rounded-3xl">
            <label class="text-yellow-600" for="familia">Familias profesionales
                @php
                    $n=1;
                @endphp
                @foreach($ciclos as $ciclo)

                    <div class="flex flex-row">
                        <input type="checkbox" id="familia" name="familia[]" value="{{$ciclo->nombre}}" class="py-1">
                        <span class="ml-3 text-green-{{$n++*200+200}}">{{$ciclo->familia}}</span>
                    </div>
                @endforeach
            </label>
        </div>


        <label class="block text-gray-700 text-sm font-bold mb-2" for="ciclo">
            Familia profesional a la que va dirigido
        </label>
        {{--        <select  id='familia' name='familia[]' multiple class="w-full border bg-white rounded px-3 py-2 outline-none ">--}}
        {{--            <option class="py-1 2xl:focus-within:text-gray-100">Selecciona una familia</option>--}}
        {{--            @foreach($ciclos as $ciclo)--}}
        {{--                <option class="py-1">{{$ciclo->familia}}</option>--}}
        {{--            @endforeach--}}
        {{--        </select>--}}
        <fieldset class="">
            <legend class="">Familias profesionales</legend>
            @foreach($ciclos as $ciclo)
                <input type="checkbox" id="familia" name="familia[]" value="{{$ciclo->familia}}"
                       class="py-1">{{$ciclo->familia}} <br/>
            @endforeach
        </fieldset>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="ciclo">
            Ciclo al que va dirigido
        </label>
        <div id='ciclo'>
            {{--            Falta implementar esta parte--}}
            <h2>Para mostrar ciclos, selecciona una familia</h2>
        </div>
        <input type="submit" value="Enviar">
    </form>


@endsection
@section('script')
    <script type="text/javascript">
        $("#form input[type=checkbox]").click(function () {
            var ciclos = [];
            $("input:checkbox:checked").each(function () {
                ciclos.push($(this).val()+"-"+$(this).className());
            });
            $.ajax({
                url: "{{ route('ciclos.get_by_family')}}?familia=" + ciclos,
                method: 'GET',
                success: function (data) {
                    $('#ciclo').html(data.html);
                }
            });
        });
        {{--$.ajax({--}}
        {{--    url: "{{ route('ciclos.get_by_family') }}?familia=" + $(this).val(),--}}
        {{--    data:'_token = <?php echo csrf_token() ?>',--}}

        {{--    method: 'GET',--}}
        {{--    success: function (data) {--}}
        {{--        $('#ciclo').html(data.html);--}}
        {{--    }--}}
        {{--});--}}

    </script>
@endsection

