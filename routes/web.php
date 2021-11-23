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

Route::get('/', 'HomeController');
//Route::redirect('/', '/teste');
Route::view('/teste', 'teste');

Route::prefix('/tarefas')->group(function(){

  // Listagem de tarefas
  Route::get('/', 'TarefasController@list');

  // Tela de ADIÇÃO de nova tarefa.
  Route::get('add', 'TarefasController@add');
  // AÇÃO de ADIÇÃO nova tarefa. 
  Route::post('add', 'TarefasController@addAction');

  // Tela de EDIÇÃO de uma tarefa.
  Route::get('edit/{id}', 'TarefasController@edit');
  // AÇÃO de EDIÇÃO de uma tarefa.
  Route::post('edit/{id}', 'TarefasController@editAction');

  // AÇÃO de DELETAR uma tarefa.
  Route::get('delete/{id}', 'TarefasController@del');
  
  // MARCAR resolvido || não.
  Route::get('marcar/{id}', 'TarefasController@done');

});


Route::prefix('/config')->group(function(){

  Route::get('/', 'Admin\ConfigController@index');
  Route::post('/', 'Admin\ConfigController@index');
  Route::get('info', 'Admin\ConfigController@info');  
  Route::get('permissoes', 'Admin\ConfigController@permissoes');

});
/*
Route::prefix('/config')->group(function(){
  Route::get('/', function(){
      return view('config');
  });
  Route::get('info', function(){
    echo "Configurações INFO 2";
  });
  Route::get('permissoes', function(){
    echo "Configurações PERMISSOES 2";
  });
});
*/
/*
Route::get('/config', function () {
  return view('config');
});
Route::get('/config/info', function () {
  echo "Configurações INFO";
})->name('info');
Route::get('/config/permissoes', function () {
  echo "Configurações PERMISSÕES";
})->name('permissoes');
*/



Route::get('/noticia/{slug}', function ($slug) {
    echo "SLUG: ".$slug;
});

Route::get('/noticia/{slug}/comentario/{id}', function ($slug, $id) {
    echo "Mostrando o comentario ".$id." da noticia ".$slug;
});

// Pega só letras - REGEX
Route::get('/user/{name}', function ($name) {
    echo "Mostrando usuário de NOME: ".$name;
})->where('name', '[a-z]+');
// Pega só números
Route::get('/user/{id}', function ($id) {
    echo "Mostrando usuário ID: ".$id;
});

Route::fallback(function(){
  return view('404');
});