<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class TurnoTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateTurno()
    {
        $dados = [
            'turno' => '4º Turno'
        ];

        $this->post('/api/turnos', $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turno', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testNotCreateTurnoEmpty()
    {
        $dados = [
            'turno' => ''
        ];

        $this->post('/api/turnos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTurnoNameTooLong()
    {
        $dados = [
            'turno' => 'Turno Turno '
        ];

        $this->post('/api/turnos', $dados);

        $this->assertResponseStatus(422);

    }

    public function testViewTurno()
    {
        $turno = \App\Turno::first();

        $this->get('/api/turnos/'.$turno->id);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turno', $reposta);
        $this->assertArrayHasKey('id', $reposta);
    }

    public function testUpdateTurno()
    {
        $turno = \App\Turno::first();

        $dados = [
            'turno' => '4º Turno'
        ];

        $this->put('/api/turnos/'.$turno->id, $dados);

        $this->assertResponseOk();

        $reposta = (array) json_decode($this->response->content());

        $this->assertArrayHasKey('turno', $reposta);
        $this->assertArrayHasKey('id', $reposta);

        $this->seeInDatabase('turnos', [
            'turno' => $dados['turno']
        ]);
    }

    public function testDeleteTurno()
    {
        $turno = \App\Turno::findOrFail(5);

        $this->delete('/api/turnos/'.$turno->id);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeleteTurno()
    {
        $turno = \App\Turno::first();

        $this->delete('/api/turnos/'.$turno->id);

        $this->assertResponseStatus(500);

    }
}
