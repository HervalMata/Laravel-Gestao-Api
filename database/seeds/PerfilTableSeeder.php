<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('perfils')->insert([
            'nome' => 'Administrador'
        ]);
        DB::table('perfils')->insert([
            'nome' => 'Gerente'
        ]);
        DB::table('perfils')->insert([
            'nome' => 'Supervisor'
        ]);
        DB::table('perfils')->insert([
            'nome' => 'Operador'
        ]);
    }
}
