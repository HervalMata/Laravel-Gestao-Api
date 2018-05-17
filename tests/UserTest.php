<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '1111',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/users', $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('unidade_id', $reposta);
        $this->assertArrayHasKey('chave', $reposta);
        $this->assertArrayHasKey('name', $reposta);
        $this->assertArrayHasKey('email', $reposta);
        $this->assertArrayHasKey('ativo', $reposta);
        $this->assertArrayHasKey('perfil_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testNotCreateUserNameEmpty()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '1111',
            'name' => '',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserChaveEmpty()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserChaveTooLong()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '11111',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserNameTooLong()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '1111',
            'name' => 'FulanoFulanoFulanoFulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserEmailEmpty()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '1111',
            'name' => 'Fulano',
            'email' => '',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserEmailTooLong()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '1111',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.comfulano@gmail.comfulano@gmail.comfulano@gmail.comfulano@gmail.comfulano@gmail.comfulano@gmail.comfulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserUnidadeEmpty()
    {
        $dados = [
            'unidade_id' => null,
            'chave' => '1111',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserPerfilEmpty()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '1111',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => null
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserPasswordEmpty()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '1111',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => '',
            'password_confirmation' => '',
            'ativo' => true,
            'perfil_id' => 2
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserPasswordNotMatch()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => '1111',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => '123',
            'ativo' => true,
            'perfil_id' => 2
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUserChaveNotUnique()
    {
        $dados = [
            'unidade_id' => 1,
            'chave' => 'oooo',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testViewUser()
    {
        $user = \App\User::first();

        $this->get('/api/users/'.$user->id);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('unidade_id', $reposta);
        $this->assertArrayHasKey('chave', $reposta);
        $this->assertArrayHasKey('name', $reposta);
        $this->assertArrayHasKey('email', $reposta);
        $this->assertArrayHasKey('ativo', $reposta);
        $this->assertArrayHasKey('perfil_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testUpdateUser()
    {
        $user = \App\User::first();

        $dados = [
            'unidade_id' => 2,
            'chave' => 'ooo2',
            'name' => 'Fulano',
            'email' => 'fulano@gmail.com',
            'password' => 'Gerente',
            'password_confirmation' => 'Gerente',
            'ativo' => true,
            'perfil_id' => 1
        ];

        $this->put('/api/users/'.$user->id, $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('unidade_id', $reposta);
        $this->assertArrayHasKey('chave', $reposta);
        $this->assertArrayHasKey('name', $reposta);
        $this->assertArrayHasKey('email', $reposta);
        $this->assertArrayHasKey('ativo', $reposta);
        $this->assertArrayHasKey('perfil_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('users', [
            'unidade_id' => $dados['unidade_id'],
            'chave'=> $dados['chave'],
            'name'=> $dados['name'],
            'email'=> $dados['email'],
            'ativo'=> $dados['ativo'],
            'perfil_id'=> $dados['perfil_id'],
        ]);
    }

    public function testDeleteUser()
    {
        $user = \App\User::findOrFail(5);

        $this->delete('/api/users/'.$user->id);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeleteUser()
    {
        $user = \App\User::findOrFail(7);

        $this->delete('/api/users/'.$user->id);

        $this->assertResponseStatus(500);

    }

    public function testAllViewUser()
    {
        $this->get('/api/users/');

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'unidade_id',
                'chave',
                'name',
                'email',
                'ativo',
                'perfil_id'
            ]
        ]);
    }

}
