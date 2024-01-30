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
        Schema::create('siadi_inscripcions', function (Blueprint $table) {
            $table->id('id_inscripcion');
            $table->unsignedBigInteger('id_siadi_persona');
            $table->unsignedBigInteger('id_planificar_asignatura');
            $table->enum('tipo_pago_inscripcion',['Efectivo','Depósito']);
            $table->date('fecha_inscripcion');
            $table->string('observacion_inscripcion')->nullable();
            $table->enum('estado_inscripcion',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->foreign('id_siadi_persona')->references('id_siadi_persona')->on('siadi_personas')->onDelete('cascade');
           $table->foreign('id_planificar_asignatura')->references('id_planificar_asignatura')->on('siadi_planificar_asignaturas')->onDelete('cascade');

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
        Schema::dropIfExists('siadi_inscripcions');
    }
};
