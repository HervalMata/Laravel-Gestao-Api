<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurmaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('turmas')->insert([
            'turma' => 'A',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('turmas')->insert([
            'turma' => 'B',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('turmas')->insert([
            'turma' => 'C',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('turmas')->insert([
            'turma' => 'D',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
        DB::table('turmas')->insert([
            'turma' => 'E',
            'created_at' => '2018-5-17 17:20:00',
            'updated_at' => '2018-5-17 17:20:00',
        ]);
    }
}
