@extends('layouts.admin')

@section('title', 'Listagem de Tarefas')

@section('content')
  <h1>Listagem</h1>

  <a href="{{ route('tarefas.add') }}">Adicionar nova tarefa</a>

    @if(count($list) > 0)
      <ul>
        @foreach($list as $item)
          <li>
            <a href="{{ route('tarefas.done', ['id'=>$item->id]) }}">[ @if($item->resolvido===1) desmarcar @else marcar @endif ]</a>
            {{ $item->titulo }}
            <a href="{{ route('tarefas.edit', ['id'=>$item->id]) }}">[ Editar ]</a>
            <a href="{{ route('tarefas.del', ['id'=>$item->id]) }}" onclick="return confirm('Tem certeza que deseja EXCLUIR?')">[ Excluir ]</a>
          </li>
        @endforeach
      </ul>     
    @else
      Não há ítens a serem listados.
    @endif

@endsection