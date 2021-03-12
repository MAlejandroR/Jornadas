<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Método para la solicitud ajax de las familias
     * Un poco chapuceado, revisar para mejorarlo
     * Los colores para que cada ciclo esté con el color de su familia
     * He añadido un atributo en el elemento llamado color para conseguir este efecto
     *
     * $familia un string con las familias y ciclos seleccionados en la vista
     * Envío por post y separado por comas
     *
     */
    public function get(Request $request)
    {
//        $colores = ['red', 'green', 'blue'];


        info("aquí estoy ",[]);

        info ("Se ha pasado ",$_POST);



        $familias = $request->familias;
        info ("Se ha pasado ",$familias);

        $html = $familias == ""? "Debes seleccionar una familia para ver ciclos":"";

        if ($familias != "") {
            info("Valor leído ", $familias);

            $html = "<div class='flex flex-row justify-content-around'>";
            foreach ($familias as $familia) {
                $ciclos = Ciclo::where("familia", $familia)->get();
                info("Coonsulta ", [$ciclos->count()]);
                if ($ciclos->count()>0) {
                    $color =Ciclo::select("color")->where("familia", $familia)->first();
                    $c = $color->color;
                    $html .= " <div class='flex flex-col justify-center   w-1/4 p-6
                    border-$c-700 rounded-3xl'>";
                    $html .= "<h2 class='text-$c-700 text-xl mb-7'>$familia</h2>";
                    foreach ($ciclos as $ciclo) {
                        $ck = "";
                        if (in_array($ciclo->nombre, $familias))
                            $ck = "checked";
                        $html .= "<label for='' class='text-$c-800 flex flex-row' >
                          <input $ck type='checkbox' class='form-checkbox text-indigo-600' name='ciclo[$familia][]' value='$ciclo->nombre'/>
                          <span class='ml-2' >$ciclo->nombre</span>
                          </label><br />";
                    }
                    $html .= "</div>";
                }
            }
            $html .= "</div>";
        }
        return response()->json(['html' => $html]);
   }

    public function index()
    {
        $ciclos = Ciclo::select("familia")->distinct()->get();
        return view("empresas.ciclos", compact("ciclos"));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ciclo $ciclo
     * @return \Illuminate\Http\Response
     */
    public function show(Ciclo $ciclo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ciclo $ciclo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciclo $ciclo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ciclo $ciclo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ciclo $ciclo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciclo $ciclo)
    {
        //
    }
}
