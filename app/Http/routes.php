<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});
/* RUTAS DE API REST UTILIZANDO DINGO */
$api = app('Dingo\Api\Routing\Router');
/**
 * VERSIONES DE API REST
 */
$api->version('v1', function ($api) {
    //crear grupos de api rest full
    $api->group(['namespace' => 'sw\Http\Controllers'], function ($api) {
        //ruta para consultar usuarios autorizados a consumir servicio web
        $api->post('/auth/authorizer-client', 'OAuth2@Autorizacion');
        //proteccion de api resf full
        $api->group(['middleware' => 'api.auth'], function ($api) {
            $api->resource('users', 'UserController');
            $api->resource('persona', 'PersonaController');
        });
    });
});
