<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaDetalleSandwichs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_sandwichs', function (Blueprint $table) {
            $table->integer('id_producto')->unsigned();
            $table->integer('id_ingrediente')->unsigned();
            $table->integer('cantidad');
            $table->integer('predeterminado'); //0: no predeterminado, 1: predeterminado
            $table->timestamps();

            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes');

            $table->primary(['id_producto','id_ingrediente']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_sandwichs');
    }
}
