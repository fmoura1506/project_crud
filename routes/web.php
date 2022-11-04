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

Route::get('/', function () { return view('login'); });

//Tela login
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login.index');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar')->name('login.autenticar');
//-------------------------------------------------------------------------------------
//Tela cadastrar para cadastro de usuários para acesso a tela formulários
Route::get('/cadastrar', 'App\Http\Controllers\LoginController@create')->name('login.create');
Route::post('/cadastrar', 'App\Http\Controllers\LoginController@store')->name('login.store');
//-------------------------------------------------------------------------------------
//Tela formulario com autenticação para apenas usuários cadastrados
Route::get('/formulario', 'App\Http\Controllers\FormularioController@create')->name('formulario.create')->middleware('autenticacao'); //formulario.contato
Route::post('/formulario', 'App\Http\Controllers\FormularioController@store')->name('formulario.store'); //formulario contato
//-------------------------------------------------------------------------------------
//utilizando Policy para ocultar a view "Gerenciar"
Route::get('/formulario/gerenciar', 'App\Http\Controllers\FormularioController@gerenciar')->name('formulario.gerenciar'); 
//utilizando Gate para ocultar a view "Gate"
Route::get('/formulario/gate', 'App\Http\Controllers\FormularioController@gate')->name('formulario.gate');
//-------------------------------------------------------------------------------------
//Tela redefinir para trocar senha ou email diretamento no banco de dados
Route::get('/formulario/redefinir', 'App\Http\Controllers\LoginController@redefinir')->name('login.redefinir')->middleware('autenticacao');
Route::put('/formulario/redefinir', 'App\Http\Controllers\LoginController@update')->name('login.update');
//-------------------------------------------------------------------------------------
//Tela para usuários com perfil de administradores
Route::get('/formulario/consultarLogin', 'App\Http\Controllers\LoginController@indexLogin')->name('login.indexLogin');
//Editar e excluir login - permissão apenas para adm - Consulta de Login
Route::get('/formulario/consultarLogin/editar/{id}', 'App\Http\Controllers\LoginController@editarLogin')->name('login.editarLogin');
Route::put('/formulario/consultarLogin/editar/{id}', 'App\Http\Controllers\LoginController@updateLogin')->name('login.updateLogin');
Route::get('/formulario/consultarLogin/excluir/{id}', 'App\Http\Controllers\LoginController@excluirLogin')->name('login.excluirLogin');
Route::post('/formulario/consultarLogin/excluir/{id}', 'App\Http\Controllers\LoginController@destroyLogin')->name('login.destroyLogin'); 
//-------------------------------------------------------------------------------------
//Consulta de formularios (opção e mensagem_contato)
Route::get('/formulario/consultarForm', 'App\Http\Controllers\FormularioController@consulta')->name('formulario.consulta')->middleware('autenticacao');
//-------------------------------------------------------------------------------------
//Excluir e editar do consulta
Route::get('/formulario/consultarForm/editar/{id}', 'App\Http\Controllers\FormularioController@edit')->name('formulario.edit');
Route::put('/formulario/consultarForm/editar/{id}', 'App\Http\Controllers\FormularioController@update')->name('formulario.update');
//-------------------------------------------------------------------------------------
Route::get('/formulario/consultarForm/excluir/{id}', 'App\Http\Controllers\FormularioController@delete')->name('formulario.delete');
Route::post('/formulario/consultarForm/excluir/{id}', 'App\Http\Controllers\FormularioController@destroy')->name('formulario.destroy');
//-------------------------------------------------------------------------------------
//Pesquisar login e form
Route::any('/formulario/pesquisarLogin', 'App\Http\Controllers\LoginController@pesquisarLogin')->name('login.pesquisarLogin')->middleware('autenticacao');
Route::any('/formulario/pesquisarForm', 'App\Http\Controllers\FormularioController@pesquisarForm')->name('formulario.pesquisarForm')->middleware('autenticacao');
//-------------------------------------------------------------------------------------
//Tela sair para logout de usuários autenticados
Route::get('/sair', 'App\Http\Controllers\LoginController@logout')->name('login.logout');

