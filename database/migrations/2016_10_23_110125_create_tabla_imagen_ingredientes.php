<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaImagenIngredientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_ingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ingrediente')->unsigned();
            $table->string('nombreImagen');
            $table->string('estado');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('id_ingrediente')->references('id')->on('ingredientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagen_ingredientes');
    }
}
