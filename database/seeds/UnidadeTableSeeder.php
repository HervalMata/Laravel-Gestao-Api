<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unidades')->insert([
            'nome' => 'TEU'
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Hidrogenio'
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Movimentação'
        ]);
        DB::table('unidades')->insert([
            'nome' => 'TMA'
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Utilidades'
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Amonia'
        ]);
    }
}
