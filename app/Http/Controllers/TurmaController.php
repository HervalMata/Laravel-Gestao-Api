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
}
