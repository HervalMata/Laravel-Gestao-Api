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
            'turma' => 'A'
        ]);
        DB::table('turmas')->insert([
            'turma' => 'B'
        ]);
        DB::table('turmas')->insert([
            'turma' => 'C'
        ]);
        DB::table('turmas')->insert([
            'turma' => 'D'
        ]);
        DB::table('turmas')->insert([
            'turma' => 'E'
        ]);
    }
}
