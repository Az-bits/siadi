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
        Schema::create('siadi_gestions', function (Blueprint $table) {
            $table->id('id_gestion');
            $table->string('nombre_gestion');
            $table->enum('estado_gestion',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
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
        Schema::dropIfExists('siadi_gestions');
    }
};
