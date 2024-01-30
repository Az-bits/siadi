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
        Schema::create('certificados', function (Blueprint $table) {
            $table->id('certificado_id');
            $table->unsignedBigInteger('id_nota')->uniqid();
            $table->string('gestion');
            $table->string('numero_siadi_certificado');
            $table->string('tipo_curso');
            $table->date('fecha_siadi_certificado');
            $table->string('codigo_siadi_certificado');
            # $table->string('estado_siadi_certificado')->nullable();
            $table->enum('estado_siadi_certificado',['ACTIVO','INACTIVO','ELIMINAR'])->default('ACTIVO');
            $table->string('imagen_certificado', 256)->nullable();
 $table->foreign('id_nota')->references('id_nota')->on('siadi_notas')->onDelete('cascade');
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
        Schema::dropIfExists('certificados');
    }
};
