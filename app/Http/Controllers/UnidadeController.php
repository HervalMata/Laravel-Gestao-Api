<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UnidadeController extends Controller
{
    //
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $unidade = new Unidade($request->all());
        $unidade->save();

        return $unidade;
    }

}
