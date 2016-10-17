<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaDetalleOrdenCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_orden_compras', function (Blueprint $table) {
            $table->integer('id_orden_compra')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->decimal('montoTotal',10,2);
            $table->timestamps();

            $table->foreign('id_orden_compra')->references('id')->on('orden_compras');
            $table->foreign('id_producto')->references('id')->on('productos');

            $table->primary(['id_orden_compra','id_producto']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_orden_compras');
    }
}
