<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TipoTest extends TestCase
{
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

        $this->post('/api/tipos', $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('tipo', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }
}
