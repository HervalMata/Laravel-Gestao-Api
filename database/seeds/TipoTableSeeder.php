<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipos')->insert([
            'tipo' => 'TT'
        ]);
        DB::table('tipos')->insert([
            'tipo' => 'TF'
        ]);
        DB::table('tipos')->insert([
            'tipo' => 'DC+'
        ]);
        DB::table('tipos')->insert([
            'tipo' => 'DC-'
        ]);
    }
}
