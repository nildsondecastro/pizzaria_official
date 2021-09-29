<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('ped_id');

            $table->double('ped_taxa', 12, 2);
            $table->double('ped_valor', 12, 2);
            $table->double('ped_total', 12, 2);

            $table->unsignedBigInteger('usr_id');
            $table->foreign('usr_id')->references('id')->on('users');

            $table->longText('ped_endereco');
            $table->string('ped_telefone');

            $table->enum('ped_status', ['realizado', 'confirmado', 'preparando', 
                'entregando', 'finalizado', 'cancelado']);

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
        Schema::dropIfExists('pedidos');
    }
}
