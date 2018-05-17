<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class SituacaoTest extends TestCase
{
    use DatabaseTransactions;
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

        $this->post('/api/situacaos', $dados);

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

    $this->post('/api/situacaos', $dados);

    $this->assertResponseStatus(422);

}

    public function testNotCreateSituacaoNameTooLong()
    {
        $dados = [
            'situacao' => 'AtrasadaAtrasadaAtrasadaAtrasada'
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateSituacaoNameNotUnique()
    {
        $dados = [
            'situacao' => 'Autorizada'
        ];

        $this->post('/api/situacaos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testViewSituacao()
    {
        $situacao = \App\Situacao::first();

        $this->get('/api/situacaos/'.$situacao->id);

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

        $this->put('/api/situacaos/'.$situacao->id, $dados);

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

        $this->delete('/api/situacaos/'.$situacao->id);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeleteSituacao()
    {
        $situacao = \App\Situacao::findOrFail(2);

        $this->delete('/api/situacaos/'.$situacao->id);

        $this->assertResponseStatus(500);

    }

    public function testAllViewSituacao()
    {
        $this->get('/api/situacaos/');

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'situacao',
            ]
        ]);
    }
}
