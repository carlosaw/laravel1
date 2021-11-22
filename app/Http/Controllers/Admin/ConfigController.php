<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
  public function index(Request $request) {
    
    $nome = 'Carlos';
    $idade = 90;
    $cidade = $request->input('cidade');

    $lista = [
      ['nome'=>'farinha', 'qt'=>'200 gr'],
      ['nome'=>'ovo', 'qt'=>'4 uni'],
      ['nome'=>'leite', 'qt'=>'150 ml'],
      ['nome'=>'fermento', 'qt'=>'10 gr']
    ];

    $data = [
      'nome' => $nome,
      'idade' => $idade,
      'cidade' => $cidade,
      'lista' => $lista
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
