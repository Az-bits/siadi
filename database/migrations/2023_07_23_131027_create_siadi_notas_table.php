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
        Schema::create('siadi_notas', function (Blueprint $table) {
            $table->id('id_nota');
            $table->unsignedBigInteger('id_inscripcion');
            $table->integer('primera_nota')->default(0);
            $table->integer('segunda_nota')->default(0);
            $table->integer('tercera_nota')->default(0);
            $table->integer('segundo_turno_nota')->nullable();
            $table->integer('final_nota')->default(0);
            $table->string('nro_folio_nota');
            $table->string('nro_carpeta_nota');
            $table->enum('observacion_nota',['APROBADO','REPROBADO','NO SE PRESENTO','NO ASIGNADO'])->default('NO ASIGNADO');
            $table->enum('estado_nota',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->foreign('id_inscripcion')->references('id_inscripcion')->on('siadi_inscripcions')->onDelete('cascade');
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
        Schema::dropIfExists('siadi_notas');
    }
};
