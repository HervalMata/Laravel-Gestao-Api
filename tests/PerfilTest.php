<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class PerfilTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatePerfil()
    {
        $dados = [
            'nome' => 'Teste'
        ];

        $this->post('/api/perfis', $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testNotCreatePerfilEmpty()
    {
        $dados = [
            'nome' => ''
        ];

        $this->post('/api/perfis', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreatePerfilNameTooLong()
{
    $dados = [
        'nome' => 'dggjjhffdddjjkkkoç.mgrsgyyyyyyyyyyyyyyyyy'
    ];

    $this->post('/api/perfis', $dados);

    $this->assertResponseStatus(422);

    }

    public function testNotCreatePerfilNameNotUnique()
    {
        $dados = [
            'nome' => 'Gerente'
        ];

        $this->post('/api/perfis', $dados);

        $this->assertResponseStatus(422);

    }

    public function testViewPerfil()
    {
        $perfil = \App\Perfil::first();

        $this->get('/api/perfis/'.$perfil->id);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    /*public function testUpdatePerfil()
    {
        $perfil = \App\Perfil::first();

        $dados = [
            'nome' => 'Teste'
        ];

        $this->put('/api/perfis/'.$perfil->id, $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('perfis', [
            'nome' => $dados['nome']
        ]);
    }*/

    public function testAllViewPerfil()
    {
        $this->get('/api/perfis/');

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'nome',
            ]
        ]);
    }

    /*public function testDeletePerfil()
    {
        $perfil = \App\Perfil::findOrFail(6);

        $this->delete('/api/perfis/'.$perfil->id);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }*/
}
