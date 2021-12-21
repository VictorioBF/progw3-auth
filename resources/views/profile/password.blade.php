@extends('templates.base')
@section('title', 'Perfil')
@section('h1', 'Editar Senha')

@section('content')
<div class="row">
  <form method="post" action="{{ route('perfil.record.password', Auth::user()) }}">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nome" class="form-label">Senha Atual: </label>
        <input type="password" name="currentPassword" id="currentPassword" value="">
    </div>
    <div class="mb-3">
        <label for="nome" class="form-label">Nova Senha:</label>
        <input type="password" name="password" id="password" value="">
    </div>
    </div>
    <div class="mb-3">
        <label for="nome" class="form-label">Nova Senha:</label>
        <input type="password" name="repeatPassword" id="repeatPassword" value="">
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Editar</button>
    </div>
  </form>
</div>

@endsection