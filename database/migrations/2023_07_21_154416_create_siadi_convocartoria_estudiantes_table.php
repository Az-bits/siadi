<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siadi_convocartoria_estudiantes', function (Blueprint $table) {
            $table->id('id_convocartoria_estudiante');
            $table->string('nombre_convocatoria_estudiante');
            $table->enum('estado_convocatoria_estudiante',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siadi_convocartoria_estudiantes');
    }
};
