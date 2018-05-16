<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TurmaTest extends TestCase
{
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

        $this->post('/api/turmas', $dados);

        $this->assertResponseOk();

        /*$reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turma', $reposta);
        $this->assertArrayHasKey('id', $reposta);*/
    }

    public function testNotCreateTurmaEmpty()
    {
        $dados = [
            'turma' => ''
        ];

        $this->post('/api/turmas', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTurmaNameTooLong()
    {
        $dados = [
            'nome' => 'ff'
        ];

        $this->post('/api/turmas', $dados);

        $this->assertResponseStatus(422);

    }

    public function testViewTurma()
    {
        $turma = \App\Turma::first();

        $this->get('/api/turmas/'.$turma->id);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turma', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }
}
