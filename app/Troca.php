<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Troca extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'turma1_id','turma2_id','turno1_id','turno2_id','tipo1_id','tipo2_id',
        'tipo3_id','tipo4_id','user1_id','user2_id','unidade_id','situacao_id',
        'data1', 'data2'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
