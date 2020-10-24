<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('factura_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('cantidad');

            $table->foreign('factura_id')->references('id')->on('factura');
            $table->foreign('producto_id')->references('id')->on('producto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_factura');
    }
}
