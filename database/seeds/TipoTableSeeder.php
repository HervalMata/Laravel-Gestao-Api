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
            'tipo' => 'TT',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('tipos')->insert([
            'tipo' => 'TF',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('tipos')->insert([
            'tipo' => 'DC+',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('tipos')->insert([
            'tipo' => 'DC-',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
    }
}
