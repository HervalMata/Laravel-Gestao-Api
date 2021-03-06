<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            'situacao' => 'required|min:3|max:20|unique:situacaos'
        ]);

        $situacao = Situacao::find($id);

        $situacao->situacao = $request->input('situacao');
        $situacao->update();

        return $situacao;
    }

    public function list()
    {
        return Situacao::all();
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
