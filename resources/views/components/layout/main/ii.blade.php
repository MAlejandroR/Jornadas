<div>
    <form action={{route("empresas.ponencias")}} method='POST'>
        @csrf
        <input type="hidden" name="empresa" value="informatica">
        <x-form.button>
            <img class="m-6 rounded-3xl" src="{{asset("images/informaticaycomunicaciones.png")}}"
                 alt="Informática y comunicacones">
        </x-form.button>
    </form>
</div>


