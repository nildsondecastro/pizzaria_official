<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemdopedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemdopedidos', function (Blueprint $table) {
            $table->bigIncrements('itp_id');

            $table->longText('itp_nome');
            $table->double('itp_valor', 12, 2);

            $table->unsignedBigInteger('ped_id')->nullable();
            $table->foreign('ped_id')->references('ped_id')->on('pedidos');

            $table->unsignedBigInteger('car_id')->nullable();
            $table->foreign('car_id')->references('car_id')->on('carrinhos');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemdopedidos');
    }
}
