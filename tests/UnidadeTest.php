<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class UnidadeTest extends TestCase
{

    use DatabaseTransactions;

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

        $this->post('/api/unidades', $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testViewUnidade()
    {
        $unidade = \App\Unidade::first();

        $this->get('/api/unidades/'.$unidade->id);

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

        $this->put('/api/unidades/'.$unidade->id, $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('nome', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('unidades', [
            'nome' => $dados['nome']
        ]);
    }
}
