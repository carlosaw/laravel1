@extends('layouts.admin')

@section('title', 'Login')

@section('content')

  @if(session('warning'))
    @alert
      {{session('warning')}}
    @endalert
  @endif
  <br/>
  <form method="POST">
    @csrf
    
    <input type="email" name="email" placeholder="Digite um e-mail" /><br/><br/>
    
    <input type="password" name="password" placeholder="Digite uma senha" /><br/><br/>
 
    <input type="submit" value="Entrar" />
  </form>

@endsection