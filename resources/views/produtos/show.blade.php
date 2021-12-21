@extends('templates.base')
@section('title', 'Visualizar produto')

@section('content')
<h1>{{ $prod->nome }}</h1>
<div style="width: 50%">
  <img src="{{asset('img/' . $prod->image)}}" style="width: 100%; height: 100%; objectFit: cover"/>
</div>
<p>Preço: R$ {{$prod->preco}}</p>
<p>Descrição do produto: {{ $prod->descricao }}</p>
@endsection