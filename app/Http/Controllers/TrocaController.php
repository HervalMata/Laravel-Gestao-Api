<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Troca;

class TrocaController extends Controller
{
    //
    public function __construct(Troca $troca)
    {
        //
        $this->troca = $troca;
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

    public function list(Request $request)
    {
        $user1_id = $situacao_id = $turma1_id = $unidade_id = '';
        $column = 'trocas.data1';
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

        $trocas = $this->troca->orderBy($column, $direction)
            ->join('users AS users1', 'users1.id', '=', 'trocas.user1_id')
            ->join('users AS users2', 'users2.id', '=', 'trocas.user2_id')
            ->join('turmas AS turmas1', 'turmas1.id', '=', 'trocas.turma1_id')
            ->join('turmas AS turmas2', 'turmas2.id', '=', 'trocas.turma2_id')
            ->join('turnos AS turnos1', 'turnos1.id', '=', 'trocas.turno1_id')
            ->join('turnos AS turnos2', 'turnos2.id', '=', 'trocas.turno2_id')
            ->join('tipos AS tipos1', 'tipos1.id', '=', 'trocas.tipo1_id')
            ->join('tipos AS tipos2', 'tipos2.id', '=', 'trocas.tipo2_id')
            ->join('tipos AS tipos3', 'tipos3.id', '=', 'trocas.tipo3_id')
            ->join('tipos AS tipos4', 'tipos4.id', '=', 'trocas.tipo4_id')
            ->join('situacaos', 'situacaos.id', '=', 'trocas.situacao_id')
            ->join('unidades', 'unidades.id', '=', 'trocas.unidade_id')
            ->select('unidades.nome AS unidade', 'users1.name AS Usuario1', 'turmas1.turma AS Turma1', 'users2.name AS Usuario2', 'turmas2.turma AS Turma2 ',
                        'data1', 'turnos1.turno AS Turno1', 'tipos1.tipo AS Tipo1', 'tipos2.tipo AS Tipo2', 'data2', 'turnos2.turno AS Turno2',
                'tipos3.tipo AS Tipo3',  'tipos4.tipo AS Tipo4', 'situacaos.situacao AS situacao');

        if ($request->has('user1_id')) {
            $trocas = $trocas->where('users.name', 'LIKE', "%" . $request->input('users1_id') . "%");
            $user1_id = $request->input('users1_id');
        }

        if ($request->has('turma1_id')) {
            $trocas = $trocas->where('turmas.turma', 'LIKE', "%" . $request->input('turma1_id') . "%");
            $turma1_id = $request->input('turma1_id');
        }

        if ($request->has('unidade_id')) {
            $trocas = $trocas->where('unidades.nome', 'LIKE', "%" . $request->input('unidade_id') . "%");
            $unidade_id = $request->input('unidade_id');
        }

        if ($request->has('situacao_id')) {
            $trocas = $trocas->where('situacaos.situacao', 'LIKE', "%" . $request->input('situacao_id') . "%");
            $situacao_id = $request->input('situacao_id');
        }

        $trocas = $trocas->paginate($per_page);

        $response = [
            'trocas' => $trocas,
            'params' => [
                'total' => $trocas->total(),
                'per_page' => $trocas->perPage(),
                'current_page' => $trocas->currentPage(),
                'last_page' => $trocas->lastPage(),
                'next_page_url' => $trocas->nextPageUrl(),
                'prev_page_url' => $trocas->previousPageUrl(),
                'direction' => $direction,
                'column' => $column,
            ],
            'filters' => [
                'user1_id' => $user1_id,
                'unidade_id' => $unidade_id,
                'turma1_id' => $turma1_id,
                'situacao_id' => $situacao_id
            ]
        ];
        return response()->json($response);
    }

    public function listCadastradas(Request $request)
    {
        $user2_id =  auth()->user();
        $situacao_id = 2;
        $column = 'trocas.data1';
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

        $trocas = $this->troca->orderBy($column, $direction)
            ->join('users AS users1', 'users1.id', '=', 'trocas.user1_id')
            ->join('users AS users2', 'users2.id', '=', 'trocas.user2_id')
            ->join('turmas AS turmas1', 'turmas1.id', '=', 'trocas.turma1_id')
            ->join('turmas AS turmas2', 'turmas2.id', '=', 'trocas.turma2_id')
            ->join('turnos AS turnos1', 'turnos1.id', '=', 'trocas.turno1_id')
            ->join('turnos AS turnos2', 'turnos2.id', '=', 'trocas.turno2_id')
            ->join('tipos AS tipos1', 'tipos1.id', '=', 'trocas.tipo1_id')
            ->join('tipos AS tipos2', 'tipos2.id', '=', 'trocas.tipo2_id')
            ->join('tipos AS tipos3', 'tipos3.id', '=', 'trocas.tipo3_id')
            ->join('tipos AS tipos4', 'tipos4.id', '=', 'trocas.tipo4_id')
            ->join('situacaos', 'situacaos.id', '=', 'trocas.situacao_id')
            ->join('unidades', 'unidades.id', '=', 'trocas.unidade_id')
            ->select('unidades.nome AS unidade', 'users1.name AS Usuario1', 'turmas1.turma AS Turma1', 'users2.name AS Usuario2', 'turmas2.turma AS Turma2 ',
                'data1', 'turnos1.turno AS Turno1', 'tipos1.tipo AS Tipo1', 'tipos2.tipo AS Tipo2', 'data2', 'turnos2.turno AS Turno2',
                'tipos3.tipo AS Tipo3',  'tipos4.tipo AS Tipo4', 'situacaos.situacao AS situacao');

        if ($request->has('user2_id')) {
            $trocas = $trocas->where('users.name', 'LIKE', "%" . $request->input('user2_id') . "%");
            $user2_id = $request->input('user2_id');
        }

        if ($request->has('situacao_id')) {
            $trocas = $trocas->where('situacaos.situacao', 'LIKE', "%" . $request->input('situacao_id') . "%");
            $situacao_id = $request->input('situacao_id');
        }

        $trocas = $trocas->paginate($per_page);

        $response = [
            'trocas' => $trocas,
            'params' => [
                'total' => $trocas->total(),
                'per_page' => $trocas->perPage(),
                'current_page' => $trocas->currentPage(),
                'last_page' => $trocas->lastPage(),
                'next_page_url' => $trocas->nextPageUrl(),
                'prev_page_url' => $trocas->previousPageUrl(),
                'direction' => $direction,
                'column' => $column,
            ],
            'filters' => [
                'user2_id' => $user2_id,
                'situacao_id' => $situacao_id
            ]
        ];
        return response()->json($response);
    }

    public function listConfirmadas(Request $request)
    {
        $situacao_id = 5;
        $column = 'trocas.data1';
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

        $trocas = $this->troca->orderBy($column, $direction)
            ->join('users AS users1', 'users1.id', '=', 'trocas.user1_id')
            ->join('users AS users2', 'users2.id', '=', 'trocas.user2_id')
            ->join('turmas AS turmas1', 'turmas1.id', '=', 'trocas.turma1_id')
            ->join('turmas AS turmas2', 'turmas2.id', '=', 'trocas.turma2_id')
            ->join('turnos AS turnos1', 'turnos1.id', '=', 'trocas.turno1_id')
            ->join('turnos AS turnos2', 'turnos2.id', '=', 'trocas.turno2_id')
            ->join('tipos AS tipos1', 'tipos1.id', '=', 'trocas.tipo1_id')
            ->join('tipos AS tipos2', 'tipos2.id', '=', 'trocas.tipo2_id')
            ->join('tipos AS tipos3', 'tipos3.id', '=', 'trocas.tipo3_id')
            ->join('tipos AS tipos4', 'tipos4.id', '=', 'trocas.tipo4_id')
            ->join('situacaos', 'situacaos.id', '=', 'trocas.situacao_id')
            ->join('unidades', 'unidades.id', '=', 'trocas.unidade_id')
            ->select('unidades.nome AS unidade', 'users1.name AS Usuario1', 'turmas1.turma AS Turma1', 'users2.name AS Usuario2', 'turmas2.turma AS Turma2 ',
                'data1', 'turnos1.turno AS Turno1', 'tipos1.tipo AS Tipo1', 'tipos2.tipo AS Tipo2', 'data2', 'turnos2.turno AS Turno2',
                'tipos3.tipo AS Tipo3',  'tipos4.tipo AS Tipo4', 'situacaos.situacao AS situacao');

        if ($request->has('situacao_id')) {
            $trocas = $trocas->where('situacaos.situacao', 'LIKE', "%" . $request->input('situacao_id') . "%");
            $situacao_id = $request->input('situacao_id');
        }

        $trocas = $trocas->paginate($per_page);

        $response = [
            'trocas' => $trocas,
            'params' => [
                'total' => $trocas->total(),
                'per_page' => $trocas->perPage(),
                'current_page' => $trocas->currentPage(),
                'last_page' => $trocas->lastPage(),
                'next_page_url' => $trocas->nextPageUrl(),
                'prev_page_url' => $trocas->previousPageUrl(),
                'direction' => $direction,
                'column' => $column,
            ],
            'filters' => [
                'situacao_id' => $situacao_id
            ]
        ];
        return response()->json($response);
    }

    public function listAutorizadas(Request $request)
    {
        $situacao_id = 1;
        $column = 'trocas.data1';
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

        $trocas = $this->troca->orderBy($column, $direction)
            ->join('users AS users1', 'users1.id', '=', 'trocas.user1_id')
            ->join('users AS users2', 'users2.id', '=', 'trocas.user2_id')
            ->join('turmas AS turmas1', 'turmas1.id', '=', 'trocas.turma1_id')
            ->join('turmas AS turmas2', 'turmas2.id', '=', 'trocas.turma2_id')
            ->join('turnos AS turnos1', 'turnos1.id', '=', 'trocas.turno1_id')
            ->join('turnos AS turnos2', 'turnos2.id', '=', 'trocas.turno2_id')
            ->join('tipos AS tipos1', 'tipos1.id', '=', 'trocas.tipo1_id')
            ->join('tipos AS tipos2', 'tipos2.id', '=', 'trocas.tipo2_id')
            ->join('tipos AS tipos3', 'tipos3.id', '=', 'trocas.tipo3_id')
            ->join('tipos AS tipos4', 'tipos4.id', '=', 'trocas.tipo4_id')
            ->join('situacaos', 'situacaos.id', '=', 'trocas.situacao_id')
            ->join('unidades', 'unidades.id', '=', 'trocas.unidade_id')
            ->select('unidades.nome AS unidade', 'users1.name AS Usuario1', 'turmas1.turma AS Turma1', 'users2.name AS Usuario2', 'turmas2.turma AS Turma2 ',
                'data1', 'turnos1.turno AS Turno1', 'tipos1.tipo AS Tipo1', 'tipos2.tipo AS Tipo2', 'data2', 'turnos2.turno AS Turno2',
                'tipos3.tipo AS Tipo3',  'tipos4.tipo AS Tipo4', 'situacaos.situacao AS situacao');

        if ($request->has('situacao_id')) {
            $trocas = $trocas->where('situacaos.situacao', 'LIKE', "%" . $request->input('situacao_id') . "%");
            $situacao_id = $request->input('situacao_id');
        }

        $trocas = $trocas->paginate($per_page);

        $response = [
            'trocas' => $trocas,
            'params' => [
                'total' => $trocas->total(),
                'per_page' => $trocas->perPage(),
                'current_page' => $trocas->currentPage(),
                'last_page' => $trocas->lastPage(),
                'next_page_url' => $trocas->nextPageUrl(),
                'prev_page_url' => $trocas->previousPageUrl(),
                'direction' => $direction,
                'column' => $column,
            ],
            'filters' => [
                'situacao_id' => $situacao_id
            ]
        ];
        return response()->json($response);
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

    public function updateConfirmadas(Request $request, $id)
    {
        'situacao_id' == 5;

        $this->validate($request, [
            'situacao_id' => 'required'
        ]);

        $troca = Troca::find($id);

        $troca->situacao_id = $request->input('situacao_id');
        $troca->update();

        return $troca;
    }

    public function updateRejeitadas(Request $request, $id)
    {
        $dados = [
            'situacao_id' => 7
        ];

        $this->validate($request, [
            'situacao_id' => 'required'
        ]);

        $troca = Troca::find($id);

        $troca->situacao_id = $request->input('situacao_id');
        $troca->update();

        return $troca;
    }

    public function updateAutorizadas(Request $request, $id)
    {
        'situacao_id' == 1;

        $this->validate($request, [
            'situacao_id' => 'required'
        ]);

        $troca = Troca::find($id);

        $troca->situacao_id = $request->input('situacao_id');
        $troca->update();

        return $troca;
    }

    public function updateCanceladas(Request $request, $id)
    {
        'situacao_id' == 3;

        $this->validate($request, [
            'situacao_id' => 'required'
        ]);

        $troca = Troca::find($id);

        $troca->situacao_id = $request->input('situacao_id');
        $troca->update();

        return $troca;
    }

    public function updateConcluidas(Request $request, $id)
    {
        'situacao_id' == 4;

        $this->validate($request, [
            'situacao_id' => 'required'
        ]);

        $troca = Troca::find($id);

        $troca->situacao_id = $request->input('situacao_id');
        $troca->update();

        return $troca;
    }

    public function updatePendentes(Request $request, $id)
    {
            'situacao_id' == 6;

        $this->validate($request, [
            'situacao_id' => 'required'
        ]);

        $troca = Troca::find($id);

        $troca->situacao_id = $request->input('situacao_id');
        $troca->update();

        return $troca;
    }
}
