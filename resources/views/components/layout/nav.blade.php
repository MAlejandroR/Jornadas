<form action="{{route('empresas.create')}}" METHOD="get">
    <button
            type='submit' class="m-1 py-2 px-4
     2xl:bg-red-400
      text-red-600
       font-semibold border
        border-red-600 rounded hover:bg-red-600
         hover:text-white
          hover:border-transparent
          transition
          ease-in duration-200
           transform hover:-translate-y-1
            active:translate-y-0">
        Añadir empresa
    </button>
     <x-form.a-href href="{{route('empresas.index')}}">
        Ver Empresas
    </x-form.a-href>

</form>
