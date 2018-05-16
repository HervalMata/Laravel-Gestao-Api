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

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turma', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }
}
