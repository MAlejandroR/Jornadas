<div>
    <form action={{route("empresas.ponencias")}} method='POST'>
        @csrf
{{--        <input type="hidden" name="empresa" value="comercio">--}}
{{--        <x-form.button id="id" >--}}
{{--            <img id="comercio" class="m-6 rounded-3xl" src="{{asset("images/comercio.png")}}" alt="Comercio y Marketing">--}}
{{--        </x-form.button>--}}
        <input type="hidden" name="empresa" value="jornadas">
        <x-form.button id="id" class="w-20v" >
            <img id="jornadas" class="rounded-3xl"
                 src="{{asset("images/familias/jornadas.png")}}" alt="JornadasTécnicas">
        </x-form.button>
    </form>
</div>
