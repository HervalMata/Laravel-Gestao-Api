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
            'turno' => '1º Turno'
        ]);
        DB::table('turnos')->insert([
            'turno' => '2º Turno'
        ]);
        DB::table('turnos')->insert([
            'turno' => '3º Turno'
        ]);
    }
}
