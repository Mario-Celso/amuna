<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Facades\Route;

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
    return "Bem vindo a Api-Amuna";
});

//tools
$router->get('tools','ToolController@index');
$router->get('tools/{id}','ToolController@show');
$router->post('tools','ToolController@store');
$router->put('tools/{id}','ToolController@update');
$router->delete('tools/{id}','ToolController@destroy');
