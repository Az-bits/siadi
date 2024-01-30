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
        Schema::create('siadi_costos', function (Blueprint $table) {
            $table->id('id_costo');
            $table->string('deposito')->default('10000004713083 - BANCO UNION S.A.');
            $table->integer('costo_siado_costo');
            $table->string('tipo_costo');
            $table->string('observacion_costo');
            $table->enum('estado_costo',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
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
        Schema::dropIfExists('siadicostos');
    }
};
