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
        Schema::create('siadi_idiomas', function (Blueprint $table) {
            $table->id('id_idioma');
            $table->string('nombre_idioma');
            $table->enum('tipo_idioma',['NATIVO','EXTRANJERO']);
            $table->string('sigla_codigo_idioma');
            $table->enum('estado_idioma',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');

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
        Schema::dropIfExists('siadi_idiomas');
    }
};
