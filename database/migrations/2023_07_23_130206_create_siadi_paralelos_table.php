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
        Schema::create('siadi_paralelos', function (Blueprint $table) {
            $table->id('id_paralelo');
            $table->string('nombre_paralelo');
            $table->enum('estado_paralelo',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
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
        Schema::dropIfExists('siadi_paralelos');
    }
};
