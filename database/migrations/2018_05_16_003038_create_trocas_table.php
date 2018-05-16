<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrocasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trocas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidade_id')->unsigned();
            $table->integer('user1_id')->unsigned();
            $table->integer('turma1_id')->unsigned();
            $table->integer('user2_id')->unsigned();
            $table->integer('turma2_id')->unsigned();
            $table->date('data1');
            $table->integer('turno1_id')->unsigned();
            $table->integer('tipo1_id')->unsigned();
            $table->integer('tipo2_id')->unsigned();
            $table->date('data2');
            $table->integer('turno2_id')->unsigned();
            $table->integer('tipo3_id')->unsigned();
            $table->integer('tipo4_id')->unsigned();
            $table->integer('situacao_id')->unsigned();
            $table->timestamps();

            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('restrict');
            $table->foreign('user1_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('user2_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('turma1_id')->references('id')->on('turmas')->onDelete('restrict');
            $table->foreign('turma2_id')->references('id')->on('turmas')->onDelete('restrict');
            $table->foreign('turno1_id')->references('id')->on('turnos')->onDelete('restrict');
            $table->foreign('turno2_id')->references('id')->on('turnos')->onDelete('restrict');
            $table->foreign('tipo1_id')->references('id')->on('tipos')->onDelete('restrict');
            $table->foreign('tipo2_id')->references('id')->on('tipos')->onDelete('restrict');
            $table->foreign('tipo3_id')->references('id')->on('tipos')->onDelete('restrict');
            $table->foreign('tipo4_id')->references('id')->on('tipos')->onDelete('restrict');
            $table->foreign('situacao_id')->references('id')->on('situacoes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trocas');
    }
}
