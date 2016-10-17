<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaSandwichs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sandwichs', function (Blueprint $table) {
            $table->integer('id_producto')->unsigned()->unique();;
            $table->integer('id_tipo_sandwich')->unsigned();
            $table->timestamps();

            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_tipo_sandwich')->references('id')->on('tipo_sandwichs');

            $table->primary('id_producto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sandwichs');
    }
}
