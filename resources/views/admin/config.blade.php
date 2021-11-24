@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')
  <h1>Configurações</h1>

  Olá, {{$nome}}

  <a href="/logout">Sair</a><br/><br/>

  <!--@component('components.alert')
    Alguma frase qualquer 2...
  @endcomponent-->
  
  @alert ATALHO
    Alguma frase qualquer...
  @endalert

    <ul> 
      @forelse($lista as $item)
        <li>{{ $item['qt'] }} - {{ $item['nome'] }}</li>
      @empty
        <li>Não há ingredientes</li>
      @endforelse
    </ul>
 
  <!--@if(count($lista) > 0)
  Lista de Bolo:
  <ul>
    @foreach($lista as $item)
      <li>{{ $item['qt'] }} - {{ $item['nome'] }}</li>
    @endforeach
  </ul>
  @else
    Não há ingredientes.
  @endif-->
  
  @if($showform)
    <form method="POST">
      @csrf
      Nome:<br/>
      <input type="text" name="nome" /><br/><br/>
      Idade:<br/>
      <input type="number" name="idade" /><br/><br/>
      Cidade:<br/>
      <input type="text" name="cidade" /><br/><br/>

      <input type="submit" value="Enviar" />
    </form>
  @endif
  <a href="/config/info">Informações</a>
@endsection