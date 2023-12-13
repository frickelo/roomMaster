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
            $table->id('id');
            $table->unsignedBigInteger('materia_espacios');
            $table->foreign('materia_espacios')->references('id')->on('materia_espacios');
            $table->String('campo');
            $table->String('antiguo_valor');
            $table->string('nuevo_valor');
            $table->timestamp('fecha')->nullable();
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
        Schema::drop('materia_espacios_audits');
    }
}
