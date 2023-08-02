@extends('site/layout')
@section('title', 'Detalhes')
@section('conteudo')

<div class="row container">
    <div class="col s12 m6">
       <img src="{{ $produto->imagem }}" class="img-responsive img-fluid">
    </div>

    <div class="col s12 m6">
        <h4>{{ $produto->nome }}</h4>
        <h4> R$ {{number_format($produto->preco, 2, ',', '.')}}</h4>
        <p>{{ $produto->descricao }}</p>
        <p> Postado por: {{ $produto->user->firtName }}<br>
            Categoria: {{ $produto->categoria->nome }}
        </p>
        
        <button class="waves-effect waves-light pink accent-4 btn-large"> Comprar </button>    
    </div>
</div>

@endsection