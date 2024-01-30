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
        Schema::create('siadi_personas', function (Blueprint $table) {
            $table->id('id_siadi_persona');
            $table->integer('ci_persona');
            $table->unsignedBigInteger('id_persona_base_upea')->nullable();
            $table->string('expedido_persona');
            $table->string('estado_civil_persona');
            $table->string('paterno_persona');
            $table->string('materno_persona');
            $table->string('nombres_persona');
            $table->string('pais_persona');
            $table->enum('genero_persona',['F','M']);
            $table->date('fecha_nacimiento_persona');
            $table->string('profesion_persona')->nullable();
            $table->string('direccion_persona');
            $table->integer('telefono_persona')->nullable();    
            $table->integer('celular_persona')->nullable();
            $table->string('email_persona')->unique();
            $table->unsignedBigInteger('id_tipo_estudiante');

            $table->enum('estado_persona',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->foreign('id_tipo_estudiante')->references('id_tipo_estudiante')->on('siadi_tipo_estudiantes')->onDelete('cascade');
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
        Schema::dropIfExists('siadi_personas');
    }
};
