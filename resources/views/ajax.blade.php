<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
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

</head>
<body>

    <form action={{route('empresas.store')}} enctype="multipart/form-data" method='POST' id="form"
    <label class="block text-gray-700 text-sm font-bold mb-2" for="ciclo">
        Familia profesional a la que va dirigido
    </label>
    <select onchange='getMensaje()' id='familia' name='familia'
            class="w-full border bg-white rounded px-3 py-2 outline-none ">
        <option class="py-1 2xl:focus-within:text-gray-100">Selecciona una familia</option>
        @foreach($ciclos as $ciclo)
            <option class="py-1">{{$ciclo->familia}}</option>
        @endforeach
    </select>

    <label class="block text-gray-700 text-sm font-bold mb-2" for="ciclo">
        Ciclo al que va dirigido
    </label>
    <div id='ciclo'>
        <h2>Para mostrar ciclos, selecciona una familia</h2>
    </div>
</body>
</html>
