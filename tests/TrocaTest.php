<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TrocaTest extends TestCase
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
    public function testCreateTroca()
    {
        $dados = [
            'unidade_id' => 2,
            'user1_id' => 7,
            'turma1_id' => 1,
            'user2_id' => 8,
            'turma2_id' => 2,
            'data1' => '2018-6-6',
            'turno1_id' => 1,
            'tipo1_id' => 1,
            'tipo2_id' => 2,
            'data2' => '2018-6-7',
            'turno2_id' => 2,
            'tipo3_id' => 2,
            'tipo4_id' => 1,
            'situacao_id' => 2
        ];

        $this->post('/api/trocas', $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('unidade_id', $reposta);
        $this->assertArrayHasKey('user1_id', $reposta);
        $this->assertArrayHasKey('turma1_id', $reposta);
        $this->assertArrayHasKey('user2_id', $reposta);
        $this->assertArrayHasKey('turma2_id', $reposta);
        $this->assertArrayHasKey('data1', $reposta);
        $this->assertArrayHasKey('turno1_id', $reposta);
        $this->assertArrayHasKey('tipo1_id', $reposta);
        $this->assertArrayHasKey('tipo2_id', $reposta);
        $this->assertArrayHasKey('data2', $reposta);
        $this->assertArrayHasKey('turno2_id', $reposta);
        $this->assertArrayHasKey('tipo3_id', $reposta);
        $this->assertArrayHasKey('tipo4_id', $reposta);
        $this->assertArrayHasKey('situacao_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testViewTroca()
    {
        $troca = \App\Troca::first();

        $this->get('/api/trocas/'.$troca->id, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('unidade_id', $reposta);
        $this->assertArrayHasKey('user1_id', $reposta);
        $this->assertArrayHasKey('turma1_id', $reposta);
        $this->assertArrayHasKey('user2_id', $reposta);
        $this->assertArrayHasKey('turma2_id', $reposta);
        $this->assertArrayHasKey('data1', $reposta);
        $this->assertArrayHasKey('turno1_id', $reposta);
        $this->assertArrayHasKey('tipo1_id', $reposta);
        $this->assertArrayHasKey('tipo2_id', $reposta);
        $this->assertArrayHasKey('data2', $reposta);
        $this->assertArrayHasKey('turno2_id', $reposta);
        $this->assertArrayHasKey('tipo3_id', $reposta);
        $this->assertArrayHasKey('tipo4_id', $reposta);
        $this->assertArrayHasKey('situacao_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testAllViewTroca()
    {
        $this->get('/api/trocas/', $this->api_token);

        $this->assertResponseOk();

    }

    public function testAllViewTrocaCadastrada()
    {
        $this->get('/api/trocas/cadastradas', $this->api_token);

        $this->assertResponseOk();

    }

    public function testAllViewTrocaConfirmada()
    {
        $this->get('/api/trocas/confirmadas', $this->api_token);

        $this->assertResponseOk();

    }

    public function testAllViewTrocaAutorizada()
    {
        $this->get('/api/trocas/autorizadas', $this->api_token);

        $this->assertResponseOk();

    }

    public function testUpdateTroca()
    {
        $troca= \App\Troca::first();

        $dados = [
            'situacao_id' => 2
        ];

        $this->put('/api/trocas/'.$troca->id, $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('situacao_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('trocas', [
            'situacao_id' => $dados['situacao_id']
        ]);
    }

    public function testUpdateTrocaConfirmada()
    {
        $troca= \App\Troca::first();

        $dados = [
            'situacao_id' => 5
        ];

        $this->put('/api/trocas/confirmar/'.$troca->id, $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('situacao_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('trocas', [
            'situacao_id' => $dados['situacao_id']
        ]);
    }

    public function testUpdateTrocaRejeitada()
    {
        $troca= \App\Troca::first();

        $dados = [
            'situacao_id' => 7
        ];

        $this->put('/api/trocas/rejeitar/'.$troca->id, $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('situacao_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('trocas', [
            'situacao_id' => $dados['situacao_id']
        ]);
    }
}
