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
}
