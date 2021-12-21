@extends('templates.base')
@section('title', 'Perfil')
@section('h1', 'Perfil')

@section('content')
<div class="row">
  <div class="col">
      <p>Aqui estão os dados do seu perfil:</p>
  </div>
  @if (session('erro'))
    
    <!-- Erro -->
    <div class="alert alert-danger" role="alert">
    {{ session('erro') }}
    </div>

    @endif
</div>
<div class="row">
  Nome: {{Auth::user()->name}}
  @if (Auth::user()->admin != 0)
    ADMIN
  @endif
</div>
<div class="row">
  Nome de usuário: {{Auth::user()->username}}<br/>
</div>
<div class="row">
  E-mail: {{Auth::user()->email}}
  @if (Auth::user()->email_verified_at != null)
  VERIFICADO
  @endif
</div>
<div class="row">
  <a href="{{ route('perfil.edit') }}" role="button" class="btn btn-outline-primary dinline">Editar</a>
  <a href="{{ route('perfil.password') }}" role="button" class="btn btn-outline-primary dinline">Editar Senha</a> 
</div>
<div class="row">
</div>

@endsection