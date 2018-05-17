<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

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

}
