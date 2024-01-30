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
        Schema::create('certificados_reimpresions', function (Blueprint $table) {
            $table->id('certificados_reimpresions_id');
            $table->unsignedBigInteger('certificado_id');
            $table->date('fecha_siadi_certificado');
            $table->string('codigo_siadi_certificado');
            $table->string('imagen_certificado', 256)->nullable();
            $table->enum('estado_siadi_certificado_reimpresions', ['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
 $table->foreign('certificado_id')->references('certificado_id')->on('certificados')->onDelete('cascade');
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
        Schema::dropIfExists('certificados_reimpresions');
    }
};
