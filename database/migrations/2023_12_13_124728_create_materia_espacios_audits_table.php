<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaEspaciosAuditsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_espacios_audits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materia_espacio_id');
            $table->foreign('materia_espacio_id')->references('id')->on('materia_espacios')->onDelete('cascade');
            $table->string('campo');
            $table->string('antiguo_valor')->nullable();
            $table->string('nuevo_valor')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->string('autor')->nullable();
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
        Schema::drop('materia_espacios_audits');
    }
}
