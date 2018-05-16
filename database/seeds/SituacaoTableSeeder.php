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
        DB::table('situacoes')->insert([
            'situacao' => 'Autorizada'
        ]);
        DB::table('situacoes')->insert([
            'situacao' => 'Cadastrada'
        ]);
        DB::table('situacoes')->insert([
            'situacao' => 'Cancelada'
        ]);
        DB::table('situacoes')->insert([
            'situacao' => 'Concluída'
        ]);
        DB::table('situacoes')->insert([
            'situacao' => 'Confirmada'
        ]);
        DB::table('situacoes')->insert([
            'situacao' => 'Pendente'
        ]);
        DB::table('situacoes')->insert([
            'situacao' => 'Rejeitada'
        ]);
    }
}
