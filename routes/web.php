<?php

use Illuminate\Support\Facades\Route;

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
Route::get("login1", function(){
    return view ("login1");

})->name("login1");


Route::view('/',"main");
/*
Route::get('/', function () {
    return view('home1');
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view("m", "home1");

Route::resource("empresas",App\Http\Controllers\EmpresaController::class);
Route::post("obtener_ciclos",("App\Http\Controllers\CicloController@get"))->name("ciclos.get_by_family");
Route::get("obtener_ciclos",("App\Http\Controllers\CicloController@index"))->name("ciclos.get_by_family");
Route::get("ajax",'App\Http\Controllers\Ajax@index');
Route::get("prueba",'App\Http\Controllers\Ajax@ciclos');

