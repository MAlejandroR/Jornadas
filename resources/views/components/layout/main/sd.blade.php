<div>
    <form action={{route("empresas.ponencias")}} method='POST'>
        @csrf
        <input type="hidden" name="empresa" value="imagen">

        <x-form.button id="sd">
            <img id="images" class="m-6 rounded-3xl" src="{{asset("images/imagen.png")}}" alt="Imagen y Producción">
        </x-form.button>
    </form>
</div>

