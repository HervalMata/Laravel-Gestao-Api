<?php

namespace App\Http\Controllers;


use App\Turma;

class TurmaController extends Controller
{
    //
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'turma' => 'required|min:1|max:1'
        ]);

        $turma = new Turma($request->all());
        $turma->save();

        return $turma;
    }

    public function view($id)
    {
        return Turma::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'turma' => 'required|min:1|max:1'
        ]);

        $turma = Turma::find($id);

        $turma->nome = $request->input('turma');
        $turma->update();

        return $turma;
    }

    public function list()
    {
        return Turma::all();
    }

    public function delete($id)
    {
        if (Turma::destroy($id)) {
            return new Response('Removido com sucesso.', 200);
        } else {
            return new Response('Erro ao remover.', 500);
        }
    }
}