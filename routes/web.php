<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/auth.php';
Auth::routes();



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



//Acceso a la página principal
Route::get('/',"App\Http\Controllers\FeriaController@index")->name("feria");


Route::resource("empresas",App\Http\Controllers\EmpresaController::class)->middleware(['auth']);


//Solicitud ajax
//Route::get("obtener_ciclos",("App\Http\Controllers\CicloController@get"))->name("ciclos.get_by_family");
Route::post("obtener_ciclos",("App\Http\Controllers\CicloController@get"))->name("ciclos.get_by_family");



Route::post("ponencias", ("App\Http\Controllers\EmpresaCiclos@ponencias"))->name("empresas.ponencias");

//Route::get("login1", function(){
//    return view ("login1");
//
//})->name("login1");


/*
Route::get('/', function () {
    return view('home1');
});
*/


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view("m", "home1");

Route::post("obtener_ciclos",("App\Http\Controllers\CicloController@get"))->name("ciclos.get_by_family");

Route::get("ajax",'App\Http\Controllers\Ajax@index');
Route::get("prueba",'App\Http\Controllers\Ajax@ciclos');

