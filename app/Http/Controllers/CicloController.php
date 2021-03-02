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


    public function get(Request $request)
    {

        $familias = $request->familia;


        $familias = explode(",", $familias);
        info("Valor leído ", $familias);
        $ciclos = "";
////
//
        $html = "";

        foreach ($familias as $familia) {
            $ciclos = Ciclo::where("familia", $familia)->get();
            foreach ($ciclos as $ciclo) {
                $ck = "";
                if (in_array($ciclo->nombre, $familias))
                    $ck = "checked";
                $html .= "<label for='' class='inline-flex items-center'>
                          <input $ck type='checkbox' class='form-checkbox text-indigo-600' value='$ciclo->nombre' />
                          <span class='ml-2' >$ciclo->nombre</span>
                          </label><br />";
            }
        }


        return response()->json(['html' => $html]);


    }

    public function index()
    {
        $ciclos = Ciclo::select("familia")->get();
        return view("instituto.empresas.ciclos", compact("ciclos"));
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
