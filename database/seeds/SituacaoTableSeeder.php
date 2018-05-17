<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('situacaos')->insert([
            'situacao' => 'Autorizada'
        ]);
        DB::table('situacaos')->insert([
            'situacao' => 'Cadastrada'
        ]);
        DB::table('situacaos')->insert([
            'situacao' => 'Cancelada'
        ]);
        DB::table('situacaos')->insert([
            'situacao' => 'Concluída'
        ]);
        DB::table('situacaos')->insert([
            'situacao' => 'Confirmada'
        ]);
        DB::table('situacaos')->insert([
            'situacao' => 'Pendente'
        ]);
        DB::table('situacaos')->insert([
            'situacao' => 'Rejeitada'
        ]);
    }
}
