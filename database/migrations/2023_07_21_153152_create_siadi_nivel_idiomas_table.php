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
        Schema::create('siadi_nivel_idiomas', function (Blueprint $table) {
            $table->id('id_nivel_idioma');
            $table->string('nombre_nivel_idioma');
            $table->string('descripcion_nivel_idioma');
            $table->enum('estado_nivel_idioma',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
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
        Schema::dropIfExists('siadi_nivel_idiomas');
    }
};
