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
        Schema::create('siadi_asignaturas', function (Blueprint $table) {
            $table->id('id_siadi_asignatura');
            $table->unsignedBigInteger('id_idioma');
            $table->unsignedBigInteger('id_nivel_idioma');
            $table->string('sigla_asignatura');
            $table->enum('estado_asignatura',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->foreign('id_idioma')->references('id_idioma')->on('siadi_idiomas')->onDelete('cascade');
            $table->foreign('id_nivel_idioma')->references('id_nivel_idioma')->on('siadi_nivel_idiomas')->onDelete('cascade');
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
        Schema::dropIfExists('siadi_asignaturas');
    }
};
