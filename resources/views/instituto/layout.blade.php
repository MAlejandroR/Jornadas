<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset("/css/app.css")}}">
    <script src="{{asset('js/app.js')}}"></script>
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }
        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
{{--    @yield('scripts')--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>


<div class="bg-smoke-light flex flex-col flex-1 justify-center h-screen mx-10 p-2.5 bg-yellow-50">


    <x-layout.header>

    </x-layout.header>
    <x-instituto.nav>


    </x-instituto.nav>
@yield("contenido")

    <x-layout.footer>

    </x-layout.footer>
</div>
@yield("script")

</body>
</html>
