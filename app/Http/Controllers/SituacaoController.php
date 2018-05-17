<?php

namespace App\Http\Controllers;


use App\Situacao;

class SituacaoController extends Controller
{
    //
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'situacao' => 'required|min:8|max:8|unique:situacaos'
        ]);

        $situacao = new Situacao($request->all());
        $situacao->save();

        return $situacao;
    }

    public function view($id)
    {
        return Situacao::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'situacao' => 'required|min:1|max:1|unique:situacaos'
        ]);

        $situacao = Situacao::find($id);

        $situacao->situacao = $request->input('situacao');
        $situacao->update();

        return $situacao;
    }

    public function delete($id)
    {
        if (Situacao::destroy($id)) {
            return new Response('Removido com sucesso.', 200);
        } else {
            return new Response('Erro ao remover.', 500);
        }
    }
}
