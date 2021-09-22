<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('per_id');


            //permissões sobre outros perfis
            $table->boolean('cliente')->default(0);             //Funcionalidades do Cliente
            $table->boolean('funcionario')->default(0);         //Funcionalidades do Funcionário
            $table->boolean('gerente')->default(0);             //Funcionalidades do Gerente
            $table->boolean('administrador')->default(0);       //Funcionalidades do Admin
            
            //$table->boolean('status')->default(1);       //1-ativo, 2-inativo

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
        Schema::dropIfExists('permissions');
    }
}
