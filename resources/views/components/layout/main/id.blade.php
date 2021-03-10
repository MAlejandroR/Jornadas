<div>
    <form action={{route("empresas.ponencias")}} method='POST'>
        @csrf
        <input type="hidden" name="empresa" value="comercio">
        <x-form.button id="id" >
            <img id="comercio" class="m-6 rounded-3xl" src="{{asset("images/comercio.png")}}" alt="Comercio y Marketing">
        </x-form.button>
    </form>
</div>
