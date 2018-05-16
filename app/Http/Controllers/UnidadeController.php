<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class UnidadeController extends Controller
{
    //
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|min:3|max:20|unique:unidades'
        ]);

        $unidade = new Unidade($request->all());
        $unidade->save();

        return $unidade;
    }

    public function view($id)
    {
        return Unidade::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required|min:3|max:20|unique:unidades'
        ]);

        $unidade = Unidade::find($id);

        $unidade->nome = $request->input('nome');
        $unidade->update();

        return $unidade;
    }

    public function list()
    {
        return Unidade::all();
    }

    public function delete($id)
    {
        if (Unidade::destroy($id)) {
            return new Response('Removido com sucesso.', 200);
        } else {
            return new Response('Erro ao remover.', 401);
        }
    }

}
