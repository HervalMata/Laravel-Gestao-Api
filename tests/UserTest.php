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
        echo $this->response->content();
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
}
