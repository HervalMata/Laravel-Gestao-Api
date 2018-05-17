<?php

namespace App\Http\Controllers;

use App\Tipo;

class TipoController extends Controller
{
    //
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tipo' => 'required|min:2|max:4'
        ]);

        $tipo = new Tipo($request->all());
        $tipo->save();

        return $tipo;
    }

    public function view($id)
    {
        return Tipo::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tipo' => 'required|min:2|max:4'
        ]);

        $tipo = Tipo::find($id);

        $tipo->nome = $request->input('tipo');
        $tipo->update();

        return $tipo;
    }

    public function list()
    {
        return Tipo::all();
    }

    public function delete($id)
    {
        if (Tipo::destroy($id)) {
            return new Response('Removido com sucesso.', 200);
        } else {
            return new Response('Erro ao remover.', 500);
        }
    }
}
