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

    public function testNotCreateTipoEmpty()
    {
        $dados = [
            'tipo' => ''
        ];

        $this->post('/api/tipos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTipoNameTooLong()
    {
        $dados = [
            'nome' => 'ffddf'
        ];

        $this->post('/api/tipos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testViewTipo()
    {
        $tipo = \App\Tipo::first();

        $this->get('/api/tipos/'.$tipo->id);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('tipo', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }


}
