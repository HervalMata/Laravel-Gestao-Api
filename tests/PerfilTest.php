<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseTransactions;

class PerfilTest extends TestCase
{

    use DatabaseTransactions;

    public $api_token = [];

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->api_token = ['api_token' => User::where('api_token', '<>', '')->first()->api_token];
    }
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

        $this->post('/api/perfis', $dados, $this->api_token);

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

        $this->post('/api/perfis', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreatePerfilNameTooLong()
{
    $dados = [
        'nome' => 'dggjjhffdddjjkkkoç.mgrsgyyyyyyyyyyyyyyyyy'
    ];

    $this->post('/api/perfis', $dados, $this->api_token);

    $this->assertResponseStatus(422);

    }

    public function testNotCreatePerfilNameNotUnique()
    {
        $dados = [
            'nome' => 'Gerente'
        ];

        $this->post('/api/perfis', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testViewPerfil()
    {
        $perfil = \App\Perfil::first();

        $this->get('/api/perfis/'.$perfil->id, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testUpdatePerfil()
    {
        $perfil = \App\Perfil::first();

        $dados = [
            'nome' => 'Teste'
        ];

        $this->put('/api/perfis/'.$perfil->id, $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('perfils', [
            'nome' => $dados['nome']
        ]);
    }

    public function testAllViewPerfil()
    {
        $this->get('/api/perfis/', $this->api_token);

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'nome',
            ]
        ]);
    }

    public function testDeletePerfil()
    {
        $perfil = \App\Perfil::findOrFail(5);

        $this->delete('/api/perfis/'.$perfil->id, $this->api_token);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeletePerfil()
    {
        $perfil = \App\Perfil::first();

        $this->delete('/api/perfis/'.$perfil->id, $this->api_token);

        $this->assertResponseStatus(500);

    }
}
