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
        Schema::create('siadi_planificar_paralelos', function (Blueprint $table) {
            $table->id('id_planificar_paralelo');
            $table->unsignedBigInteger('id_planificar_asignatura');
            $table->unsignedBigInteger('id_paralelo');
            $table->unsignedBigInteger('id_asignacion_docente')->nullable();

            $table->enum('turno_paralelo',['Mañana','Tarde','Noche']);
            $table->integer('cupo_maximo_paralelo');
            $table->integer('cupo_minimo_paralelo');
            $table->enum('estado_paralelo',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->foreign('id_planificar_asignatura')->references('id_planificar_asignatura')->on('siadi_planificar_asignaturas')->onDelete('cascade');
            $table->foreign('id_paralelo')->references('id_paralelo')->on('siadi_paralelos')->onDelete('cascade');
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
        Schema::dropIfExists('siadi_planificar_paralelos');
    }
};
