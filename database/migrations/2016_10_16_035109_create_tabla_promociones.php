<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPromociones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_administrador')->unsigned();
            $table->string('nombrePromocion');
            $table->decimal('precionPromocional',10,2);
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFin');
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
        Schema::dropIfExists('promociones');
    }
}
