<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaImagenCombos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_combos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_combo')->unsigned();
            $table->string('nombreImagen');
            $table->string('estado');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('id_combo')->references('id')->on('combos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagen_combos');
    }
}
