@extends('templates.base')
@section('title', 'Perfil')
@section('h1', 'Editar Perfil')

@section('content')
<div class="row">
  <form method="post" action="{{ route('perfil.record') }}">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="name" id="name" value="{{Auth::user()->name}}">
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" value="{{Auth::user()->email}}">
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Editar</button>
    </div>
  </form>
</div>

@endsection