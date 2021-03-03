<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Ciclo;
use App\Models\EmpresaCiclos;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("instituto.empresas.listado");
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $ciclos = DB::select("select distinct  familia from ciclos");
        return view("empresa.create", ['ciclos' => $ciclos]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $empresa = new Empresa($request->input());

        $ciclos_empresa = new EmpresaCiclos($request->input());


        $name = $request->file('logo')->getClientOriginalName();;

        $request->file('logo')->storeAs('logos', $name);
        $empresa->logo = $name;
        $empresa->saveOrFail();
        $msj = "La empresa $empresa->empresa se ha guardado en la base de datos";


        //Ahora las familias/ciclos que la relaciona

        foreach ($ciclos_empresa->ciclo as $familia => $ciclos)
            foreach ($ciclos as $ciclo) {


                $empresa = Empresa::select('id')->where("empresa", $ciclos_empresa->empresa)->first();
                info("Id de empresa  ", [$empresa->id]);
             //   dd($empresa);

                $fila_ciclo = Ciclo::select('id')->where("nombre", $ciclo)->first();
                info("Nombre de ciclo ", [$ciclo]);

                $datos = ['empresa' => $empresa->id, 'ciclo' => $fila_ciclo->id];
                $ciclo_familia = new EmpresaCiclos($datos);
                info("Quiero guardar ", $datos);
                $ciclo_familia->saveOrFail();

            }
        return view("feria", compact('msj'));


        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
