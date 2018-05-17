<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Troca;

class TrocaController extends Controller
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
            'user1_id' => 'required',
            'turma1_id' => 'required',
            'user2_id' => 'required',
            'turma2_id' => 'required',
            'data1' => 'required',
            'turno1_id' => 'required',
            'tipo1_id' => 'required',
            'tipo2_id' => 'required',
            'data2' => 'required',
            'turno2_id' => 'required',
            'tipo3_id' => 'required',
            'tipo4_id' => 'required',
            'situacao_id' => 'required',
        ]);

        $troca = new Troca($request->all());
        $troca->save();

        return $troca;
    }

    public function view($id)
    {
        return Troca::find($id);
    }

    public function list()
    {
        return Troca::all();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'situacao_id' => 'required'
        ]);

        $troca = Troca::find($id);

        $troca->situacao_id = $request->input('situacao_id');
        $troca->update();

        return $troca;
    }
}
