<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_ingredientes', function (Blueprint $table) {
            $table->bigIncrements('pi_id');

            $table->unsignedBigInteger('pro_id');
            $table->foreign('pro_id')->references('pro_id')->on('produtos');

            $table->unsignedBigInteger('ing_id');
            $table->foreign('ing_id')->references('ing_id')->on('ingredientes');

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
        Schema::dropIfExists('produtos_ingredientes');
    }
}
