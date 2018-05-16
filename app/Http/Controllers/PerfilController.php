<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class PerfilController extends Controller
{
    //

    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|min:3|max:20|unique:perfils'
        ]);

        $perfil = new Perfil($request->all());
        $perfil->save();

        return $perfil;
    }

    public function view($id)
    {
        return Perfil::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required|min:3|max:20|unique:perfils'
        ]);

        $perfil = Perfil::find($id);

        $perfil->nome = $request->input('nome');
        $perfil->update();

        return $perfil;
    }

    public function delete($id)
    {
        if (Perfil::destroy($id)) {
            return new Response('Removido com sucesso.', 200);
        } else {
            return new Response('Erro ao remover.', 500);
        }
    }

    public function list()
    {
        return Perfil::all();
    }
}
