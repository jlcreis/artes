<?php

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

/*
 * Authentication routes...
 */ 
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
 *Registration routes...
 */
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/*
 *Rotas públicas
 */
Route::get('/', 'PublicoController@listaDestaques');

Route::get('/quem_somos', 'PublicoController@quemSomos');

Route::get('/onde_comprar', function(){
    return view('publico.onde_comprar');
});

/*
 *Rotas privadas (administração)
 */
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/categorias', [
    'as' => 'listaCategoria',
    'uses' => 'CategoriasController@lista'
]);

Route::post('/categorias/detalhes', 'CategoriasController@mostra')->where ('id','[0-9]+');

Route::post('/categorias/remove', 'CategoriasController@remove');

Route::get('/categorias/novo', 'CategoriasController@novo');

Route::post('/categorias/adiciona', 'CategoriasController@adiciona');

Route::get('/produtos',[
    'as' => 'listaProduto',
    'uses' => 'ProdutoController@lista',
]);

//Route::get('/produtos/detalhes/{id}', 'ProdutoController@mostra')->where ('id','[0-9]+');
Route::get('/produtos/detalhes/{id}', [
    'as' => 'detalheProduto',
    'uses' => 'ProdutoController@mostra',
])->where ('id','[0-9]+');

Route::get('/produtos/novo','ProdutoController@novo');

Route::get('/produtos/novo', 'ProdutoCategoriaController@lista');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::post('/produtos/detalhes/removeFoto', 'ProdutoController@removeFoto');

Route::post('/produtos/detalhes/adicionaFoto', 'ProdutoController@adicionaFoto');

Route::post('/produtos/detalhes/adicionaCategoria', 'ProdutoController@adicionaCategoria');

Route::post('/produtos/detalhes/removeCategoria', 'ProdutoController@removeCategoria');

Route::get('/produtos/edita/{id}', 'ProdutoController@edita');

Route::post('/produtos/salvaEdicao/{id}', 'ProdutoController@salvaEdicao');

Route::post('/produtos/remove/', 'ProdutoController@remove');

Route::get('/fotos', 'ProdutoController@upload');

Route::post('/fotos', 'ProdutoController@move');

Route::post('/produtos/remove/excluir', 'MensagemController@erro');

