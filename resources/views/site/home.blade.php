@extends('site/layout')
@section('title', 'Essa é nossa pagina Home')
@section('conteudo')

<div class="row container">

    @foreach ($produtos as $produto)

        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                <img src="{{ $produto->image }}">

                <a  class="btn-floating halfway-fab waves-effect waves-light pink accent-3"><i class="material-icons">visibility</i></a>
                </div>
                <div class="card-content">
                <span class="card-title">{{$produto->nome}}</span>
                <p>{{ Str::limit($produto->descricao, 50, '...') }}.</p>
                </div>
            </div>
        </div>
    @endforeach
    
</div>

<div class="row center">
    {{ $produtos->links('custom/pagination') }}
</div>

@endsection