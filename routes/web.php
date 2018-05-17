<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('unidades', ['uses' => 'UnidadeController@store']);
    $router->get('unidades', ['uses' => 'UnidadeController@list']);
    $router->get('unidades/{id}', ['uses' => 'UnidadeController@view']);
    $router->put('unidades/{id}', ['uses' => 'UnidadeController@update']);
    $router->delete('unidades/{id}', ['uses' => 'UnidadeController@delete']);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('perfis', ['uses' => 'PerfilController@store']);
    $router->get('perfis', ['uses' => 'PerfilController@list']);
    $router->get('perfis/{id}', ['uses' => 'PerfilController@view']);
    $router->put('perfis/{id}', ['uses' => 'PerfilController@update']);
    $router->delete('perfis/{id}', ['uses' => 'PerfilController@delete']);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('turmas', ['uses' => 'TurmaController@store']);
    $router->get('turmas', ['uses' => 'TurmaController@list']);
    $router->get('turmas/{id}', ['uses' => 'TurmaController@view']);
    $router->put('turmas/{id}', ['uses' => 'TurmaController@update']);
    $router->delete('turmas/{id}', ['uses' => 'TurmaController@delete']);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('tipos', ['uses' => 'TipoController@store']);
    $router->get('tipos', ['uses' => 'TipoController@list']);
    $router->get('tipos/{id}', ['uses' => 'TipoController@view']);
    $router->put('tipos/{id}', ['uses' => 'TipoController@update']);
    $router->delete('tipos/{id}', ['uses' => 'TipoController@delete']);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('turnos', ['uses' => 'TurnoController@store']);
    $router->get('turnos', ['uses' => 'TurnoController@list']);
    $router->get('turnos/{id}', ['uses' => 'TurnoController@view']);
    $router->put('turnos/{id}', ['uses' => 'TurnoController@update']);
    $router->delete('turnos/{id}', ['uses' => 'TurnoController@delete']);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('situacaos', ['uses' => 'SituacaoController@store']);
    $router->get('situacaos/{id}', ['uses' => 'SituacaoController@view']);
    $router->put('situacaos/{id}', ['uses' => 'SituacaoController@update']);
});