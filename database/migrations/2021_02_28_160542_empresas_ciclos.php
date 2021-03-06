<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmpresasCiclos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_ciclos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('empresa')->constrained('empresas')->onDelete('cascade');
            $table->foreignId('ciclo')->constrained('ciclos')->onDelete('restrict');

        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciclos');
        //
    }
}
