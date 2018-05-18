<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UnidadeTest extends TestCase
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
    public function testCreateUnidade()
    {
        $dados = [
            'nome' => 'Teste'
        ];

        $this->post('/api/unidades', $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testNotCreateUnidadeEmpty()
    {
        $dados = [
            'nome' => ''
        ];

        $this->post('/api/unidades', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateUnidadeNameTooLong()
{
    $dados = [
        'nome' => 'dggjjhffdddjjkkkoç.mgrsgyyyyyyyyyyyyyyyyy'
    ];

    $this->post('/api/unidades', $dados, $this->api_token);

    $this->assertResponseStatus(422);

    }

    public function testNotCreateUnidadeNameNotUnique()
    {
        $dados = [
            'nome' => 'TEU'
        ];

        $this->post('/api/unidades', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testViewUnidade()
    {
        $unidade = \App\Unidade::first();

        $this->get('/api/unidades/'.$unidade->id, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testUpdateUnidade()
    {
        $unidade = \App\Unidade::first();

        $dados = [
            'nome' => 'Teste'
        ];

        $this->put('/api/unidades/'.$unidade->id, $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('unidades', [
            'nome' => $dados['nome']
        ]);
    }

    public function testAllViewUnidade()
    {
        $this->get('/api/unidades/', $this->api_token);

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'nome',
            ]
        ]);
    }

    public function testDeleteUnidade()
    {
        $unidade = \App\Unidade::findOrFail(6);

        $this->delete('/api/unidades/'.$unidade->id, $this->api_token);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeletePerfil()
    {
        $unidade = \App\Unidade::first();

        $this->delete('/api/perfis/'.$unidade->id, $this->api_token);

        $this->assertResponseStatus(500);

    }
}
