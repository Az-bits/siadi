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
        Schema::create('siadi_planificar_asignaturas', function (Blueprint $table) {
            $table->id('id_planificar_asignatura');
         
            $table->unsignedBigInteger('id_siadi_asignatura');
            $table->unsignedBigInteger('id_siadi_convocatoria');
            $table->unsignedBigInteger('id_paralelo');
            $table->unsignedBigInteger('id_asignacion_docente')->nullable();
            $table->enum('turno_paralelo',['Mañana','Tarde','Noche']);
            $table->integer('cupo_maximo_paralelo');
            $table->integer('cupo_minimo_paralelo');
            $table->string('carga_horaria_planificar_asignartura');
            $table->enum('estado_planificar_asignartura',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->foreign('id_siadi_asignatura')->references('id_siadi_asignatura')->on('siadi_asignaturas')->onDelete('cascade');
            $table->foreign('id_siadi_convocatoria')->references('id_siadi_convocatoria')->on('siadi_convocatorias')->onDelete('cascade');
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
        Schema::dropIfExists('siadi_planificar_asignaturas');
    }
};
