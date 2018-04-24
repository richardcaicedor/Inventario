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

Route::get('auth/login',[
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'auth.login'
]);
Route::post('auth/login',[
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'auth.login'
]);
Route::get('auth/logout',[
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'auth.logout'
]);

Route::group(['prefix'=>'app','middleware'=>'auth'],function(){

	Route::get('/',['as'=>'app.index',function(){
		return view('templane/main');
	}]);

	/* RUTA de administracion del catalogo de Documentos */
	Route::resource('documentos','DocumentosController');
	/* RUTA para la eliminacion de los documentos */
	Route::get('documentos/{id}/destroy',[
		'uses' => 'DocumentosController@destroy',
		'as' =>'app.documentos.destroy',
	]);

	/* RUTA de administracion del catalogo de usuarios */
	Route::resource('usuarios','UsersController');
	/* RUTA para eliminacion de usuarios */
	Route::get('usuarios/{id}/destroy',[
		'uses' => 'UsersController@destroy',
		'as' =>'app.usuarios.destroy',
	]);

	/* RUTA de administracion de los tipos de equipos  */ 
	Route::resource('tipoequipo','TipoEquipoController');
	/* RUTA para la eliminacion de los tipos de equipos */ 
	Route::get('tipoequipo/{id}/destroy',[
		'uses' => 'TipoEquipoController@destroy',
		'as' =>'app.tipoequipo.destroy',
	]);

	/* RUTA de administracion de los tipos de insumos */
	Route::resource('tipoInsumo','TipoInsumoController');
	/* RUTA para la eliminacion de los tipos de insumos */ 
	Route::get('tipoInsumo/{id}/destroy',[
		'uses' => 'TipoInsumoController@destroy',
		'as' =>'app.tipoInsumo.destroy',
	]);

	/* RUTA de administracion del inventario de activos fijos */
	Route::resource('equipos','ActivoFijoController');
	/* RUTA para la eliminacion de los activos Fijos */ 
	Route::get('equipos/{id}/destroy',[
		'uses' => 'ActivoFijoController@destroy',
		'as' =>'app.equipos.destroy',
	]); 
 
	/* RUTA de administracion del inventario de Insumos */
	Route::resource('insumos','InsumoController');
	/* RUTA para la eliminacion de los Insumos */ 
	Route::get('insumos/{id}/destroy',[
		'uses' => 'InsumoController@destroy',
		'as' =>'app.insumos.destroy',
	]);

	/* RUTA de solicitudes  */
	Route::resource('solicitud','SolicitudController');

	/* RUTA de solicitudes  */
	Route::get('solicitud/{id}/validarCantidad',['uses' =>'SolicitudController@validarCantidad','as'=>'app.solicitud.validarCantidad']);
  
});
