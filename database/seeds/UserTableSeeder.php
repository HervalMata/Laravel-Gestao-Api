<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'unidade_id' => 1,
            'chave' => 'oooo',
            'name' => 'Admin',
            'email' => 'admin_gestao@gmail.com',
            'password' => app('hash')->make('Admin'),
            'ativo' => true,
            'perfil_id' => 1,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 5,
            'chave' => 'fnaz',
            'name' => 'Elencar',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 2,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 1,
            'chave' => 'fady',
            'name' => 'Alisson',
            'email' => 'supervisor_gestao@gmail.com',
            'password' => app('hash')->make('supervisor'),
            'ativo' => true,
            'perfil_id' => 3,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 1,
            'chave' => 'fnbf',
            'name' => 'Anderson',
            'email' => 'supervisor_gestao@gmail.com',
            'password' => app('hash')->make('supervisor'),
            'ativo' => true,
            'perfil_id' => 3,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 1,
            'chave' => 'fab6',
            'name' => 'Fernando',
            'email' => 'supervisor_gestao@gmail.com',
            'password' => app('hash')->make('supervisor'),
            'ativo' => true,
            'perfil_id' => 3,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 1,
            'chave' => 'fna2',
            'name' => 'Creso',
            'email' => 'supervisor_gestao@gmail.com',
            'password' => app('hash')->make('supervisor'),
            'ativo' => true,
            'perfil_id' => 3,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 2,
            'chave' => 'znjf',
            'name' => 'Amilton',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 2,
            'chave' => 'fab2',
            'name' => 'Claudia',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 2,
            'chave' => 'fnau',
            'name' => 'Claudio',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 2,
            'chave' => 'fnaf',
            'name' => 'Fabricio',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 3,
            'chave' => 'faag',
            'name' => 'Cleber',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 3,
            'chave' => 'fawj',
            'name' => 'Lourival',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 3,
            'chave' => 'faah',
            'name' => 'Denilson',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 3,
            'chave' => 'znq0',
            'name' => 'Josenilson',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 4,
            'chave' => 'znhi',
            'name' => 'Geovanne',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 4,
            'chave' => 'znqx',
            'name' => 'Joaquim',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 4,
            'chave' => 'zn74',
            'name' => 'Andrade',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 4,
            'chave' => 'rfrt',
            'name' => 'Kappel',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 5,
            'chave' => 'fadz',
            'name' => 'Herval',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 5,
            'chave' => 'faat',
            'name' => 'Ivo',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 5,
            'chave' => 'fa46',
            'name' => 'Geraldo',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
        DB::table('users')->insert([
            'unidade_id' => 5,
            'chave' => 'znp8',
            'name' => 'Sturaro',
            'email' => 'operador_gestao@gmail.com',
            'password' => app('hash')->make('operador'),
            'ativo' => true,
            'perfil_id' => 4,
        ]);
    }
}
