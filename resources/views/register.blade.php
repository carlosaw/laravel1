@extends('layouts.admin')

@section('title', 'Cadastro')

@section('content')
  <!--Erros do Registro-->
  @if($errors->any())
    @alert
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>          
        @endforeach
      </ul>     
    @endalert
  @endif
  <br/>

  <form method="POST">
    @csrf   
    <input type="text" name="name" placeholder="Digite seu nome" value="{{old('name')}}" /><br/><br/>
    <input type="email" name="email" placeholder="Digite um e-mail" value="{{old('email')}}" /><br/><br/>    
    <input type="password" name="password" placeholder="Digite uma senha" /><br/><br/>
    <input type="password" name="password_confirmation" placeholder="Confirme sua senha" /><br/><br/>

    <input type="submit" value="Cadastrar" />
  </form>

@endsection