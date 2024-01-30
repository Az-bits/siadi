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
        Schema::create('siadi_convocatorias', function (Blueprint $table) {
            $table->id('id_siadi_convocatoria');
            $table->string('nombre_convocatoria');
            $table->unsignedBigInteger('id_gestion');
            $table->enum('periodo',['I','II','III','IV']);
            $table->unsignedBigInteger('id_tipo_convocatoria');
            $table->string('sede',400);
            $table->string('descripcion_convocatoria',400);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado_convocatoria',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->foreign('id_gestion')->references('id_gestion')->on('siadi_gestions')->onDelete('cascade');
            $table->foreign('id_tipo_convocatoria')->references('id_tipo_convocatoria')->on('siadi_tipo_convocatorias')->onDelete('cascade');
           
            
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
        Schema::dropIfExists('siadi_convocatorias');
    }
};
