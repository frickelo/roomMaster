<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaEspaciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_espacios', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('materias_id');
            $table->foreign('materias_id')->references('id')->on('materias');

            $table->unsignedBigInteger('espacios_id');
            $table->foreign('espacios_id')->references('id')->on('espacios');

            $table->unsignedBigInteger('carreras_id');
            $table->foreign('carreras_id')->references('id')->on('carreras');

            $table->unsignedBigInteger('cursos_id');
            $table->foreign('cursos_id')->references('id')->on('cursos');
            
            $table->date('dia_semana');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->String('periodo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materia_espacios');
    }
}
