<div >
    <form action="{{route('empresas.ponencias')}}" method='POST'>
        @csrf
        <input type="hidden" name="empresa" value="informatica">
        <x-form.button id="si" class="w-20v">
            <img id="enlaces" class="rounded-3xl "
                 src="{{asset("images/familias/informatica.png")}}" alt="CPI FP Los Enlaces">
        </x-form.button>
    </form>
</div>
