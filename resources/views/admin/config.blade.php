@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')
  <h1>Configurações</h1>
  
    <!--<ul> NÃO FUNCIONA
      @forelse($lista as $item)
        <li>{{ $item['nome'] }}</li>
      @empty
        <li>Não há ingredientes</li>
      @endforelse
    </ul>-->
 
  @if(count($lista) > 0)
  Lista de Bolo:
  <ul>
    @foreach($lista as $item)
      <li>{{ $item['nome'] }} - {{ $item['qt'] }}</li>
    @endforeach
  </ul>
  @else
    Não há ingredientes.
  @endif
  
  <form method="POST">
    @csrf
    Nome:<br/>
    <input type="text" name="nome" /><br/>
    Idade:<br/>
    <input type="number" name="idade" /><br/>
    Cidade:<br/>
    <input type="text" name="cidade" /><br/>

    <input type="submit" value="Enviar" />
  </form>
  <a href="/config/info">Informações</a>
@endsection