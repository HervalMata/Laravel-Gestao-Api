<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{
    //
    public function __construct(User $user)
    {
        //
        $this->user = $user;
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

    public function list(Request $request)
    {
        $perfil_id = $chave = $ativo = $name = '';
        $column = 'users.chave';
        $direction = 'asc';
        $per_page = 10;

        if ($request->has('per_page')) {
            $per_page = $request->input('per_page');
        }

        if ($request->has('direction')) {
            $direction = $request->input('direction');
        }

        if ($request->has('column')) {
            $column = $request->input('column');
        }

        $users = $this->user->orderBy($column, $direction)
                ->join('perfils', 'perfils.id', '=', 'users.perfil_id')
                ->join('unidades', 'unidades.id', '=', 'users.unidade_id')
                ->select('users.id', 'unidades.nome AS unidade', 'users.chave', 'users.name',
                    'users.email', 'users.ativo', 'perfils.nome AS perfil');

        if ($request->has('perfil_id')) {
            $users = $users->where('perfils.nome', 'LIKE', "%" . $request->input('perfil_id') . "%");
            $perfil_id = $request->input('perfil_id');
        }

        if ($request->has('chave')) {
            $users = $users->where('users.chave', 'LIKE', "%" . $request->input('chave') . "%");
            $chave = $request->input('chave');
        }

        if ($request->has('ativo')) {
            $users = $users->where('users.ativo', 'LIKE', "%" . $request->input('ativo') . "%");
            $ativo = $request->input('ativo');
        }

        if ($request->has('name')) {
            $users = $users->where('users.name', 'LIKE', "%" . $request->input('name') . "%");
            $name = $request->input('name');
        }

        $users = $users->paginate($per_page);

        $response = [
            'users' => $users,
            'params' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'next_page_url' => $users->nextPageUrl(),
                'prev_page_url' => $users->previousPageUrl(),
                'direction' => $direction,
                'column' => $column,
            ],
             'filters' => [
                 'name' => $name,
                 'chave' => $chave,
                 'perfil_id' => $perfil_id,
                 'ativo' => $ativo
             ]
        ];
//        return User::all();
        return response()->json($response);
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
