<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class TipoTest extends TestCase
{
    use DatabaseTransactions;

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

    public function testNotCreateTipoNameNotUnique()
    {
        $dados = [
            'tipo' => 'TT'
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

    public function testUpdateTipo()
    {
        $tipo = \App\Tipo::first();

        $dados = [
            'tipo' => 'TG'
        ];

        $this->put('/api/tipos/'.$tipo->id, $dados);

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
        $this->get('/api/tipos/');

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

        $this->delete('/api/tipos/'.$tipo->id);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeleteTipo()
    {
        $tipo = \App\Tipo::first();

        $this->delete('/api/tipos/'.$tipo->id);

        $this->assertResponseStatus(500);

    }
}
