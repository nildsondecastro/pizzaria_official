<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {   //personalização da tela inicial
            $table->bigIncrements('hom_id');
            $table->string('hom_faixa_decorativa')->nullable();
            $table->string('hom_nome')->nullable();
            $table->string('hom_telefone')->nullable();
            $table->string('hom_local')->nullable();
            $table->string('hom_minimo')->nullable();

            $table->string('hom_info1')->nullable();
            $table->string('hom_info2')->nullable();

            $table->string('hom_tempo_atendimento')->nullable();

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
        Schema::dropIfExists('homepages');
    }
}
