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
}
