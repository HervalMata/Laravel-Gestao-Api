<?php

namespace App\Http\Controllers;


use App\Turno;

class TurnoController extends Controller
{
    //

    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'turno' => 'required|min:8|max:8|unique:turnos'
        ]);

        $turno = new Turno($request->all());
        $turno->save();

        return $turno;
    }

    public function view($id)
    {
        return Turno::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'turno' => 'required|min:8|max:8'
        ]);

        $turno = Turno::find($id);

        $turno->nome = $request->input('turno');
        $turno->update();

        return $turno;
    }

    public function list()
    {
        return Turno::all();
    }

    public function delete($id)
    {
        if (Turno::destroy($id)) {
            return new Response('Removido com sucesso.', 200);
        } else {
            return new Response('Erro ao remover.', 500);
        }
    }

}
