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

\Event::subscribe('App\Subscriber\Auth');
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() { 

    Route::resource('roles', 'RolesController');
    Route::get('roles/{id}/delete', [
        'as' => 'roles.delete',
        'uses' => 'RolesController@destroy',
    ]);
    
    
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/cobros/fecha_pago/{fechaPago?}', 'UsersController@cobros');
    Route::get('users/{id}/delete', [
        'as' => 'users.delete',
        'uses' => 'UsersController@destroy',
    ]);
    
    Route::resource('bitacoras', 'BitacoraController');
    Route::get('bitacoras/{id}/delete', [
        'as' => 'bitacoras.delete',
        'uses' => 'BitacoraController@destroy',
    ]);
}); //middleware auth    


Route::resource('api/personas', 'API\PersonasAPIController');
Route::resource('personas', 'PersonasController');
Route::get('personas/{id}/delete', [
    'as' => 'personas.delete',
    'uses' => 'PersonasController@destroy',
]);

Route::get('contratos/estado/{estado}', 'ContratosController@estado');
Route::get('api/contratos/estado/{estado}', 'API\ContratosAPIController@estado');
Route::resource('api/contratos', 'API\ContratosAPIController');
Route::resource('contratos', 'ContratosController');
Route::get('contratos/{id}/delete', [
    'as' => 'contratos.delete',
    'uses' => 'ContratosController@destroy',
]);

Route::get('cobros/fecha_pago/{fechaPago?}', 'CobrosController@fecha_pago');
Route::resource('api/cobros', 'API\CobrosAPIController');
Route::resource('cobros', 'CobrosController');
Route::get('cobros/{id}/delete', [
    'as' => 'cobros.delete',
    'uses' => 'CobrosController@destroy',
]);


Route::resource('api/dispositivos', 'API\DispositivosAPIController');
Route::resource('dispositivos', 'DispositivosController');
Route::get('dispositivos/{id}/delete', [
    'as' => 'dispositivos.delete',
    'uses' => 'DispositivosController@destroy',
]);


Route::resource('api/traslados', 'API\TrasladosAPIController');
Route::resource('traslados', 'TrasladosController');
Route::get('traslados/{id}/delete', [
    'as' => 'traslados.delete',
    'uses' => 'TrasladosController@destroy',
]);


Route::resource('api/users', 'API\UsersAPIController');
Route::resource('users', 'UsersController');
Route::get('users/{id}/delete', [
    'as' => 'users.delete',
    'uses' => 'UsersController@destroy',
]);

