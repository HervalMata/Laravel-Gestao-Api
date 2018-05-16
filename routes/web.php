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

$router->post('/api/unidades', 'UnidadeController@store');
$router->get('/api/unidades', 'UnidadeController@list');
$router->get('/api/unidades/{id}', 'UnidadeController@view');
$router->put('/api/unidades/{id}', 'UnidadeController@update');
$router->delete('/api/unidades/{id}', 'UnidadeController@delete');