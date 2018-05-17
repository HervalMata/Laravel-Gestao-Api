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
}
