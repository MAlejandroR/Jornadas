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


//Obtenemos todas las empresas
        $empresas = Empresa::All();

//        $ciclosEmpresa = EmpresaCiclos::All();
//        $listado_empresas = [];
//        foreach ($empresas as $empresa) {
//            $listado_empresas[]['empresa'] = $empresa;
//            $id = $empresa->id;
//            //Obtener todos los ciclos de esa empresa
//            $ciclosEmpresa = EmpresaCiclos::where("empresa", $id)->get();
////OK
//            $pos_ciclo = 0;
//            foreach ($ciclosEmpresa as $ciclo) {
//
//                $c = Ciclo::where('id', $ciclo->ciclo)->first();
//                $c = Ciclo::where('id', $ciclo->ciclo)->first();
//
//                $pos = key($listado_empresas);
//
//                $listado_empresas[$pos][$pos_ciclo]['ciclo']['familia'] = $c->familia;
//
//
//                $listado_empresas[$pos][$pos_ciclo]['ciclo']['nombre'] = $c->nombre;
//                $pos_ciclo++;
//            }
//        }
//        return view("empresa.listado", ['listado_empresas' => $listado_empresas]);

        return view("empresa.listado", ['empresas' => $empresas]);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $ciclos = DB::select("select distinct  familia, color from ciclos");
//        dd($ciclos);


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

        $a = $request->file('logo')->storeAs('logos', $name);

        $empresa->logo = $name;
        info("he guardado en estorage ", [$a]);
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
        info("Valor del mensaje ", [$msj]);
        return view("feria", ['msj' => $msj]);


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


        //Obtenemos todas las familias
        $familias = DB::select("select distinct familia,color from ciclos");

        //obtenemos las familias donde esa empresa tiene relación
        $familiasSelect = DB::select("select distinct familia,color from ciclos
                                            where id IN
                                                    (select ciclo
                                                     from empresa_ciclos
                                                    where empresa =$empresa->id )");

        $ciclos =[]; //Inicializamos por si no hay ningún ciclo relacionado
        foreach ($familiasSelect as $familia) {

            $ciclos[$familia->familia] = DB::select("select nombre,color from ciclos where familia ='$familia->familia'");
        }

        //Obtenemos los nombres de los ciclos de cada familia con los que la empresa tiene relacion
        $ciclosSelect=[]; //Inicializamos por si no hubiera ninguna relación
        foreach ($familiasSelect as $familia) {
            $ciclosSelect = DB::select("select nombre from ciclos where id in
                                                    (select ciclo
                                                     from empresa_ciclos
                                                    where empresa =$empresa->id )");
        }

//dd($ciclosSelect);
        return view("empresa.editar", ['empresa' => $empresa,
            'familias' => $familias,
            'familiasSelect' => $familiasSelect,
            'ciclos' => $ciclos,
            'ciclosSelect' => $ciclosSelect]);


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

//Miramos a ver si hay  nuevo logo

            if ($request->file('logo')!=null) {
                $name = $request->file('logo')->getClientOriginalName();;
                $directorioDeLogos = asset("storage/logos");
                $a = $request->file('logo')->storeAs('logos', $name);
                info("He guardado el fichero ",[$a]);
                $empresa->logo = $name;
            }

        $empresa->fill($request->input())->saveOrFail();
        return redirect()->route('empresas.index');
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
        $empresa->delete();
        return redirect()->route('empresas.index');
        //
    }

    public function ponencias (Request $datos){
        echo "<h1>Vengo de $datos->empresa</h1>";

    }
}
