@extends('site/layout')
@section('title', 'Detalhes')
@section('conteudo')

    <div class="row container"> <br>
        <div class="col s12 m6">
            <img src="{{ url("storage/$produto->imagem") }}" class="img-responsive img-fluid" style="max-width: 80%;">
        </div>

        <div class="col s12 m6">
            <h4>{{ $produto->nome }}</h4>
            <h4> R$ {{ number_format($produto->preco, 2, ',', '.') }}</h4>
            <p>{{ $produto->descricao }}</p>
            <p> Postado por: {{ $produto->user->firtName }}<br>
                Categoria: {{ $produto->categoria->nome }}
            </p>
            <form action="{{ route('site.addcarrinho') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                <input type="number" name="qnt" style="width: 128px" min="1" value="1">
                <input type="hidden" name="img" value="{{ $produto->imagem }}">
                <br>
                <button class="waves-effect waves-light pink accent-4 btn-large"> Comprar </button>
            </form>
        </div>
    </div>

@endsection
