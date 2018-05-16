<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidade_id')->unsigned();
            $table->string('chave', 4)->unique();
            $table->string('name', 20);
            $table->string('email', 100);
            $table->string('password');
            $table->boolean('ativo')->default(true);
            $table->integer('perfil_id')->unsigned();
            $table->timestamps();

            $table->foreign('unidade_id')
                ->references('id')->on('unidades')
                ->onDelete('restrict');
            $table->foreign('perfil_id')->references('id')->on('perfils')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
