<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TurmaTest extends TestCase
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
    public function testCreateTurma()
    {
        $dados = [
            'turma' => 'F'
        ];

        $this->post('/api/turmas', $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turma', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testNotCreateTurmaEmpty()
    {
        $dados = [
            'turma' => ''
        ];

        $this->post('/api/turmas', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTurmaNameTooLong()
    {
        $dados = [
            'nome' => 'ff'
        ];

        $this->post('/api/turmas', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTurmaNameNotUnique()
    {
        $dados = [
            'turma' => 'A'
        ];

        $this->post('/api/turmas', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testViewTurma()
    {
        $turma = \App\Turma::first();

        $this->get('/api/turmas/'.$turma->id, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turma', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testUpdateTurma()
    {
        $turma = \App\Turma::first();

        $dados = [
            'turma' => 'G'
        ];

        $this->put('/api/turmas/'.$turma->id, $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turma', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('turmas', [
            'turma' => $dados['turma']
        ]);
    }

    public function testAllViewTurma()
    {
        $this->get('/api/turmas/', $this->api_token);

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'turma',
            ]
        ]);
    }

    public function testDeleteTurma()
    {
        $turma = \App\Turma::findOrFail(5);

        $this->delete('/api/turmas/'.$turma->id, $this->api_token);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeleteTurma()
    {
        $turma = \App\Turma::first();

        $this->delete('/api/turmas/'.$turma->id, $this->api_token);

        $this->assertResponseStatus(500);

    }
}
