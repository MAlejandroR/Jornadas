<div>
    <form action="{{route('empresas.ponencias')}}" method='POST'>
        @csrf
        <input type="hidden" name="empresa" value="enlaces">
        <x-form.button id="si">
            <img id="enlaces" class="m-6 rounded-3xl" src="{{asset("images/cpifpenlaces.png")}}" alt="CPI FP Los Enlaces">
        </x-form.button>
    </form>
</div>
