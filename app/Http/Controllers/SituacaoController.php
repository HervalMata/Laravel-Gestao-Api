<?php

namespace App\Http\Controllers;


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
}
