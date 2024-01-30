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
        Schema::create('siadi_tipo_convocatorias', function (Blueprint $table) {
            $table->id('id_tipo_convocatoria');
            $table->unsignedBigInteger('id_tipo_estudiante');
            $table->unsignedBigInteger('id_convocartoria_estudiante');
            $table->unsignedBigInteger('id_costo');
            $table->enum('estado_tipo_convocatoria',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->foreign('id_tipo_estudiante')->references('id_tipo_estudiante')->on('siadi_tipo_estudiantes')->onDelete('cascade');
            $table->foreign('id_convocartoria_estudiante')->references('id_convocartoria_estudiante')->on('siadi_convocartoria_estudiantes')->onDelete('cascade');
            $table->foreign('id_costo')->references('id_costo')->on('siadi_costos')->onDelete('cascade');
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
        Schema::dropIfExists('siadi_tipo_convocatorias');
    }
};
