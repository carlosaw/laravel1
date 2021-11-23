<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class HomeController extends Controller
{
  public function __invoke() {
    //$list = Tarefa::all();// Pega os itens 
    //$list = Tarefa::where('resolvido', 0)->get();// Pega um item
    /*$item = Tarefa::where('resolvido', 0)->first();
    echo $item->titulo;*/
    /*$item = Tarefa::where('resolvido', 0)->orWhere('resolvido', 1)->first();
    echo $item->titulo;*/
    /*$list = Tarefa::find([1, 2]);
    foreach($list as $item) {
      echo $item->titulo."<br/>";
    }*/
    /*$total = Tarefa::where('resolvido', 0)->count();
    echo "TOTAL: ".$total;*/

    // Adicionar tarefa
    /*$t = new Tarefa();
    $t->titulo = 'Testando com Eloquent';
    $t->save();
    echo "Salvo com Sucesso!";*/

    // Editar tarefa
    /*$t = Tarefa::find(3);
    // $t->titulo = 'Dormir';
    // $t->resolvido = 1;
    // $t->delete();
    $t->save();
    echo "Excluído com Sucesso!";*/

    // Executar em massa
    /*Tarefa::where('resolvido', 0)->update([
      'resolvido' => 1
    ]);*/
    Tarefa::where('resolvido', 0)->delete();
    //return view('welcome');
  }
}