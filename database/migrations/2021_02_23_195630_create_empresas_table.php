<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("empresa");
            $table->string("descripcion",4096);
            $table->string("ponente");
            $table->string("horario");
            $table->string("duracion");
            $table->string("enlace");
            $table->string("logo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('empresas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
