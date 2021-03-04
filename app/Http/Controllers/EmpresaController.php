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
        $listado_empresas=[];
        foreach ($empresas as $empresa){
            $listado_empresas[]['empresa']=$empresa;
            $id = $empresa->id;
            //Obtener todos los ciclos de esa empresa
            $ciclosEmpresa = EmpresaCiclos::where("empresa",$id)->get();
//OK
            $pos_ciclo=0;
            foreach ($ciclosEmpresa as $ciclo){

                $c =Ciclo::where('id',$ciclo->ciclo)->first();
                $c =Ciclo::where('id',$ciclo->ciclo)->first();

                $pos = key($listado_empresas);

                $listado_empresas[$pos][$pos_ciclo]['ciclo']['familia']=$c->familia;




                $listado_empresas[$pos][$pos_ciclo]['ciclo']['nombre']=$c->nombre;
                $pos_ciclo++;
            }
        }

        return view("empresa.listado",['listado_empresas'=>$listado_empresas]);
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

        $request->file('logo')->storeAs('storage/logos', $name);
        $request->file('logo')->storeAs('storage/logos', $name);
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
    public function edit(Empresa $empresa){
        $empresas = Empresa::All();
        $datos_empresa=[];
        foreach ($empresas as $empresa){
            $datos_empresa['empresa']=$empresa;
            $id = $empresa->id;
            //Obtener todos los ciclos de esa empresa
            $ciclosEmpresa = EmpresaCiclos::where("empresa",$id)->get();
            $pos_ciclo=0;
            foreach ($ciclosEmpresa as $ciclo){
                $c =Ciclo::where('id',$ciclo->ciclo)->first();
                $datos_empresa['ciclo'][$pos_ciclo]['familia']=$c->familia;
                $datos_empresa['ciclo'][$pos_ciclo]['nombre']=$c->nombre;
                $pos_ciclo++;
            }
        }
        $ciclos = Ciclo::all();

        return view("empresa.editar", ['datos_empresa'=>$datos_empresa, "ciclos"=>$ciclos]);




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
