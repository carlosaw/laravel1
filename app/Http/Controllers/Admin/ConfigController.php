<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;// Importa o Gate
//use Illuminate\Support\Facades\Auth; // Pegar usuário logado

class ConfigController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }

  public function index(Request $request) {
    //$user = Auth::users();// Pega usuário logado
    $user = $request->user();
    $nome = $user->name;
    
    $idade = 90;
    $cidade = $request->input('cidade');

    $lista = [
      ['nome'=>'farinha', 'qt'=>'200 gr'],
      ['nome'=>'ovo', 'qt'=>'4 uni'],
      ['nome'=>'leite', 'qt'=>'150 ml'],
      ['nome'=>'fermento', 'qt'=>'10 gr'],
      ['nome'=>'banana', 'qt'=>'2 uni']
    ];

    $data = [
      'nome' => $nome,
      'idade' => $idade,
      'cidade' => $cidade,
      'lista' => $lista,
      'showform' => Gate::allows('see-form')
    ];

    return view('admin.config', $data);
  }

  public function info() {
    echo 'Configurações INFO 3';
  }

  public function permissoes() {
    echo 'Configurações PERMISSOES 3';
  }
}
