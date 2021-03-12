<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset("/css/app.css")}}">
    <link rel="icon" href="{{ URL::asset('/images/favicon.ico') }}" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

</head>
<body>
<div class="flex flex-col flex-1 justify-between h-screen mx-10 bg-fondo">

    <x-layout.header class="h-15v">
    </x-layout.header>
    <div class="h-10v">
    @auth
        @yield("opciones")
    @endauth
    </div>
    <div class="h-65v">
    @yield("contenido")
    </div>

    <x-layout.footer class="h-10v">

    </x-layout.footer>
</div>

@section("script")
    <script>
    </script>
@show
</body>
</html>
