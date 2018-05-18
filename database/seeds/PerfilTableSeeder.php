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
            'nome' => 'Administrador',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('perfils')->insert([
            'nome' => 'Gerente',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('perfils')->insert([
            'nome' => 'Supervisor',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('perfils')->insert([
            'nome' => 'Operador',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('perfils')->insert([
            'nome' => 'Coordenador',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
    }
}
