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
        Schema::create('pre_requisitos', function (Blueprint $table) {
            $table->id('prerequisito_id');
            $table->unsignedBigInteger('id_prerequisito_asignatura');
            $table->unsignedBigInteger('id_asignatura');
             $table->foreign('id_prerequisito_asignatura')->references('id_siadi_asignatura')->on('siadi_asignaturas')->onDelete('cascade');
             $table->foreign('id_asignatura')->references('id_siadi_asignatura')->on('siadi_asignaturas')->onDelete('cascade');

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
        Schema::dropIfExists('pre_requisitos');
    }
};
