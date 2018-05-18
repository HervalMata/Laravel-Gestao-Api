<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SituacaoTest extends TestCase
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
    public function testCreateSituacao()
    {
        $dados = [
            'situacao' => 'Atrasada'
        ];

        $this->post('/api/situacaos', $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('situacao', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testNotCreateSituacaoEmpty()
{
    $dados = [
        'situacao' => ''
    ];

    $this->post('/api/situacaos', $dados, $this->api_token);

    $this->assertResponseStatus(422);

}

    public function testNotCreateSituacaoNameTooLong()
    {
        $dados = [
            'situacao' => 'AtrasadaAtrasadaAtrasadaAtrasada'
        ];

        $this->post('/api/situacaos', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateSituacaoNameNotUnique()
    {
        $dados = [
            'situacao' => 'Autorizada'
        ];

        $this->post('/api/situacaos', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testViewSituacao()
    {
        $situacao = \App\Situacao::first();

        $this->get('/api/situacaos/'.$situacao->id, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('situacao', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testUpdateSituacao()
    {
        $situacao = \App\Situacao::first();

        $dados = [
            'situacao' => 'Atrasada'
        ];

        $this->put('/api/situacaos/'.$situacao->id, $dados, $this->api_token);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('situacao', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('situacaos', [
            'situacao' => $dados['situacao']
        ]);
    }

    public function testDeleteSituacao()
    {
        $situacao = \App\Situacao::findOrFail(5);

        $this->delete('/api/situacaos/'.$situacao->id, $this->api_token);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeleteSituacao()
    {
        $situacao = \App\Situacao::findOrFail(2);

        $this->delete('/api/situacaos/'.$situacao->id, $this->api_token);

        $this->assertResponseStatus(500);

    }

    public function testAllViewSituacao()
    {
        $this->get('/api/situacaos/', $this->api_token);

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'situacao',
            ]
        ]);
    }
}
