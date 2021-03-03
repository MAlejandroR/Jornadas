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
     */
    public function get(Request $request)
    {
        $colores = ['red', 'green', 'blue'];


        $familias = $request->familia;
        $html = "";
        if ($familias != "") {

            $familias = explode(",", $familias);
            info("Valor leído ", $familias);
            $ciclos = "";
////
//
            $html = "";

//me quedo solo con los nombres quitando los colores
            foreach ($familias as $familia) {
                $datos = explode("-", $familia);
                $nombres[] = $datos[0];
            }
            $html = "<div class='flex flex-row justify-content-around'>";
            foreach ($familias as $familia) {
                $datos = explode("-", $familia);
                info("quiero ver familia - color", $datos);
                $familia = $datos[0];
                $color =isset( $datos[1])? $datos[1]: 0;
                $ciclos = Ciclo::where("familia", $familia)->get();
                info("Coonsulta ", [$ciclos->count()]);
                if ($ciclos->count()>0) {

                    $html .= " <div class='flex flex-col justify-center   w-1/4 p-6
                    border-" . $colores[$color] . "-700 rounded-3xl'>";
                    $html .= "<h2 class='text-{$colores[$color]}-700 text-4xl mb-7'>$familia</h2>";
                    foreach ($ciclos as $ciclo) {
                        $ck = "";
                        if (in_array($ciclo->nombre, $nombres))
                            $ck = "checked";
                        $html .= "<label for='' class='text-" . $colores[$color] . "-800 flex flex-row' >
                          <input $ck type='checkbox' class='form-checkbox text-indigo-600' name='ciclo[$familia][]' value='$ciclo->nombre' color='$color'/>
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
