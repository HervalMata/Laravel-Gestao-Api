<?php

namespace App\Http\Controllers;


use App\Turno;

class TurnoController extends Controller
{
    //

    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'turno' => 'required|min:8|max:8'
        ]);

        $turno = new Turno($request->all());
        $turno->save();

        return $turno;
    }

    public function list()
    {
        return Turno::all();
    }

}
