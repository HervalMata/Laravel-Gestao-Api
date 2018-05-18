<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('turnos')->insert([
            'turno' => '1º Turno',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('turnos')->insert([
            'turno' => '2º Turno',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('turnos')->insert([
            'turno' => '3º Turno',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
    }
}
