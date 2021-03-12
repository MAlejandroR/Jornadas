<div>
    <form action={{route("empresas.ponencias")}} method='POST'>
        @csrf
        <input type="hidden" name="empresa" value="comercio">

        <x-form.button id="sd" class="w-20v">
            <img id="comercio" class="rounded-3xl"
                 src="{{asset("images/familias/comercio.png")}}" alt="Comercio y Marketing">
        </x-form.button>
    </form>
</div>

