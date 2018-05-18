<?php

use App\User;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TurnoTest extends TestCase
{
    use DatabaseTransactions;

    public $api_token = [];

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->api_token = ['api_token' => User::where('api_token', '<>', '')->first()->api_token];
    }
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

        $this->post('/api/turnos', $dados, $this->api_token);

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

        $this->post('/api/turnos', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTurnoNameTooLong()
    {
        $dados = [
            'turno' => 'Turno Turno '
        ];

        $this->post('/api/turnos', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testNotCreateTurnoNameNotUnique()
    {
        $dados = [
            'turno' => '1º Turno'
        ];

        $this->post('/api/turnos', $dados, $this->api_token);

        $this->assertResponseStatus(422);

    }

    public function testViewTurno()
    {
        $turno = \App\Turno::first();

        $this->get('/api/turnos/'.$turno->id, $this->api_token);

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

        $this->put('/api/turnos/'.$turno->id, $dados, $this->api_token);

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
        $turno = \App\Turno::findOrFail(3);

        $this->delete('/api/turnos/'.$turno->id, $this->api_token);

        $this->assertResponseOk();

        $this->assertEquals("Removido com sucesso.", $this->response->content());

    }

    public function testNotDeleteTurno()
    {
        $turno = \App\Turno::first();

        $this->delete('/api/turnos/'.$turno->id, $this->api_token);

        $this->assertResponseStatus(500);

    }

    public function testAllViewTurno()
    {
        $this->get('/api/turnos/', $this->api_token);

        $this->assertResponseOk();

        $this->seeJsonStructure([
            '*' => [
                'id',
                'turno',
            ]
        ]);
    }
}
