<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/usuarios', 'App\Http\Controllers\UsuarioController@hashprueba');

Route::get('/login', 'App\Http\Controllers\UsuarioController@viewlogin')->name("login");
Route::post('/login', 'App\Http\Controllers\UsuarioController@autenticacion');
Route::get('/subir', 'App\Http\Controllers\SubirController@vistasubir')->name("subir");

 

Route::group(
    ['middleware' => 'auth'],
    function(){

        Route::resource('articulos', 'App\Http\Controllers\ArticuloController');

    }
);
