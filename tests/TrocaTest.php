<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TrocaTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateTroca()
    {
        $dados = [
            'unidade_id' => 2,
            'user1_id' => 7,
            'turma1_id' => 1,
            'user2_id' => 8,
            'turma2_id' => 2,
            'data1' => '2018-6-6',
            'turno1_id' => 1,
            'tipo1_id' => 1,
            'tipo2_id' => 2,
            'data2' => '2018-6-7',
            'turno2_id' => 2,
            'tipo3_id' => 2,
            'tipo4_id' => 1,
            'situacao_id' => 2
        ];

        $this->post('/api/trocas', $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('unidade_id', $reposta);
        $this->assertArrayHasKey('user1_id', $reposta);
        $this->assertArrayHasKey('turma1_id', $reposta);
        $this->assertArrayHasKey('user2_id', $reposta);
        $this->assertArrayHasKey('turma2_id', $reposta);
        $this->assertArrayHasKey('data1', $reposta);
        $this->assertArrayHasKey('turno1_id', $reposta);
        $this->assertArrayHasKey('tipo1_id', $reposta);
        $this->assertArrayHasKey('tipo2_id', $reposta);
        $this->assertArrayHasKey('data2', $reposta);
        $this->assertArrayHasKey('turno2_id', $reposta);
        $this->assertArrayHasKey('tipo3_id', $reposta);
        $this->assertArrayHasKey('tipo4_id', $reposta);
        $this->assertArrayHasKey('situacao_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testViewTroca()
    {
        $troca = \App\Troca::first();

        $this->get('/api/trocas/'.$troca->id);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('unidade_id', $reposta);
        $this->assertArrayHasKey('user1_id', $reposta);
        $this->assertArrayHasKey('turma1_id', $reposta);
        $this->assertArrayHasKey('user2_id', $reposta);
        $this->assertArrayHasKey('turma2_id', $reposta);
        $this->assertArrayHasKey('data1', $reposta);
        $this->assertArrayHasKey('turno1_id', $reposta);
        $this->assertArrayHasKey('tipo1_id', $reposta);
        $this->assertArrayHasKey('tipo2_id', $reposta);
        $this->assertArrayHasKey('data2', $reposta);
        $this->assertArrayHasKey('turno2_id', $reposta);
        $this->assertArrayHasKey('tipo3_id', $reposta);
        $this->assertArrayHasKey('tipo4_id', $reposta);
        $this->assertArrayHasKey('situacao_id', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testAllViewTroca()
    {
        $this->get('/api/trocas/');

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'unidade_id',
                'user1_id',
                'turma1_id',
                'user2_id',
                'turma2_id',
                'data1',
                'turno1_id',
                'tipo1_id',
                'tipo2_id',
                'data2',
                'turno2_id',
                'tipo3_id',
                'tipo4_id',
                'situacao_id'
            ]
        ]);
    }
}
