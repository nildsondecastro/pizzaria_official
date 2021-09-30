<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->bigIncrements('car_id');

            $table->double('car_taxa', 12, 2)->default(0);
            $table->double('car_valor', 12, 2)->default(0);//subtotal
            $table->double('car_total', 12, 2)->default(0);

            $table->unsignedBigInteger('usr_id');
            $table->foreign('usr_id')->references('id')->on('users');

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
        Schema::dropIfExists('carrinhos');
    }
}
