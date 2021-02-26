<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciclo;

class Ajax extends Controller
{

    public function index(){
        $ciclos = Ciclo::All()->familia;


        return view("ajax", ["ciclos"=>$ciclos]);

    }
    //
}
