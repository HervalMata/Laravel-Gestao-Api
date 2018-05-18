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
            'nome' => 'TEU',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Hidrogenio',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Movimentação',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('unidades')->insert([
            'nome' => 'TMA',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Utilidades',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Amonia',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
    }
}
