<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TipoTest extends TestCase
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
    public function testCreateTipo()
    {
        $dados = [
            'tipo' => 'DF'
        ];

        $this->post('/api/tipos', $dados,  $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('tipo', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testNotCreateTipoEmpty()
    {
        $dados = [
            'tipo' => ''
        ];

        $this->post('/api/tipos', $dados,  $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTipoNameTooLong()
    {
        $dados = [
            'nome' => 'ffddf'
        ];

        $this->post('/api/tipos', $dados,  $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTipoNameNotUnique()
    {
        $dados = [
            'tipo' => 'TT'
        ];

        $this->post('/api/tipos', $dados,  $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testViewTipo()
    {
        $tipo = \App\Tipo::first();

        $this->get('/api/tipos/'.$tipo->id,  $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('tipo', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testUpdateTipo()
    {
        $tipo = \App\Tipo::first();

        $dados = [
            'tipo' => 'TG'
        ];

        $this->put('/api/tipos/'.$tipo->id, $dados,  $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('tipo', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('tipos', [
            'tipo' => $dados['tipo']
        ]);
    }

    public function testAllViewTipo()
    {
        $this->get('/api/tipos/', $this->api_token);

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'tipo',
            ]
        ]);
    }

    public function testDeleteTipo()
    {
        $tipo = \App\Tipo::findOrFail(4);

        $this->delete('/api/tipos/'.$tipo->id, $this->api_token);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeleteTipo()
    {
        $tipo = \App\Tipo::first();

        $this->delete('/api/tipos/'.$tipo->id, $this->api_token);

        $this->assertResponseStatus(500);

    }
}
