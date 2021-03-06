<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});
*/

//Rutas de campañas 
Route::get('/campanias/', 'CampaniasController@actionVerCampanias');
Route::get('/campanias/crear', 'CampaniasController@actionCrear');
Route::post('/campanias/crear', 'CampaniasController@actionCrearCampania');
Route::get('/campanias/editar/{id}', 'CampaniasController@actionEditar');
Route::patch('/campanias/editar/{id}', 'CampaniasController@actionUpdate');
Route::delete('/campanias/borrar/{id}', 'CampaniasController@actionBorrarCampania');
Route::delete('/campanias/vaciar/{id}', 'CampaniasController@actionBorrarParticipantes');
Route::get('/campanias/id/{campania_id}', 'CampaniasController@actionVerPorCampania');
Route::post('/campanias/procesar', 'CampaniasController@actionProcesarArchivo');

// Rutas para participantes
Route::get('participantes', 'ParticipantesController@actionClicAcepta');

// Para pruebas
Route::get('/campanias/charts', 'CampaniasController@actionCharts');
Route::get('/campanias/suma', 'CampaniasController@actionSuma');


