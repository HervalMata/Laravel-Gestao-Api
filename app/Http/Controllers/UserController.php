<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{
    //
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'unidade_id' => 'required',
            'chave' => 'required|min:4|max:4|unique:users',
            'name' => 'required|min:3|max:20',
            'email' => 'required|min:3|max:100',
            'password' => 'required|confirmed',
            'ativo' => 'required',
            'perfil_id' => 'required',
        ]);

        $user = new User($request->all());
        $user->save();

        return $user;
    }

    public function view($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'unidade_id' => 'required',
            'chave' => 'required|min:4|max:4|unique:users',
            'name' => 'required|min:3|max:20',
            'email' => 'required|min:3|max:100',
            'password' => 'required|confirmed',
            'ativo' => 'required',
            'perfil_id' => 'required',
        ]);

        $user = User::find($id);

        $user->unidade_id = $request->input('unidade_id');
        $user->chave = $request->input('chave');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->ativo = $request->input('ativo');
        $user->perfil_id = $request->input('perfil_id');
        $user->update();

        return $user;
    }



    public function delete($id)
    {
        if (User::destroy($id)) {
            return new Response('Removido com sucesso.', 200);
        } else {
            return new Response('Erro ao remover.', 500);
        }
    }
}
