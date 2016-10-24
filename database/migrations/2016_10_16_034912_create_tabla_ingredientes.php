<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaIngredientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_administrador')->unsigned();
            $table->integer('id_promocion')->unsigned()->null();
            $table->string('nombreIngrediente');
            $table->decimal('precionUnitario',10,2);
            $table->string('estado');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('id_administrador')->references('id')->on('administradores');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredientes');
    }
}
