<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaDetallePagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pagos', function (Blueprint $table) {
            $table->integer('id_orden_compra')->unsigned();
            $table->integer('id_forma_pago')->unsigned();
            $table->string('tipoTarjeta')->nullable();
            $table->timestamps();

            $table->foreign('id_orden_compra')->references('id')->on('orden_compras');
            $table->foreign('id_forma_pago')->references('id')->on('forma_pagos');

            $table->primary(['id_orden_compra','id_forma_pago']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pagos');
    }
}
