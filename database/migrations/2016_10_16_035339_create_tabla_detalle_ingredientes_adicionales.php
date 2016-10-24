<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaDetalleIngredientesAdicionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingredientes_adicionales', function (Blueprint $table) {
            $table->integer('id_orden_compra')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('id_ingrediente')->unsigned();
            $table->integer('cantidad');        
            $table->timestamps();

            $table->foreign('id_orden_compra')->references('id')->on('orden_compras');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes');

            $table->primary(['id_orden_compra','id_ingrediente','id_producto'],'pk_detalle_ingrediente_adicionales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingredientes_adicionales');
    }
}
