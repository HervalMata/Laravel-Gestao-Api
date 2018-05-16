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
        DB::table('perfis')->insert([
            'nome' => 'Administrador'
        ]);
        DB::table('perfis')->insert([
            'nome' => 'Gerente'
        ]);
        DB::table('perfis')->insert([
            'nome' => 'Supervisor'
        ]);
        DB::table('perfis')->insert([
            'nome' => 'Operador'
        ]);
    }
}
