<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->call('UnidadeTableSeeder');
        $this->call('PerfilTableSeeder');
        $this->call('TurmaTableSeeder');
        $this->call('TurnoTableSeeder');
        $this->call('TipoTableSeeder');
        $this->call('SituacaoTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('TrocaTableSeeder');
    }
}
