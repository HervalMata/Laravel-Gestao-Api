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
}
