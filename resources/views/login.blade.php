@extends('layouts.admin')

@section('title', 'Login')

@section('content')

  @if(session('warning'))
    @alert
      {{session('warning')}}
    @endalert
  @endif

  @lang('messages.test')
  
  <br/>

  <form method="POST">
    @csrf
    
    <input type="email" name="email" placeholder="Digite um e-mail" /><br/><br/>
    
    <input type="password" name="password" placeholder="Digite uma senha" /><br/><br/>

    <!--Bloqueio de LOGIN (Botão de Entrar)-->
    @if($tries >= 10)
      @lang('messages.tryerror', ['count'=>3])
    @else
      <input type="submit" value="Entrar" />
    @endif
    
  </form>

  Tentativas de Login: {{ $tries }}

@endsection