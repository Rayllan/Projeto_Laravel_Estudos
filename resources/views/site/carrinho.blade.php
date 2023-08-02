@extends('site/layout')
@section('title', 'Carrinho')
@section('conteudo')

    <div class="row container">

        @if ($mensagem = Session::get('sucesso'))
            <div class="card green lighten-1">
                <div class="card-content white-text">
                    <span class="card-title">Parabéns!</span>
                    <p>{{ $mensagem }}</p>
                </div>
            </div>
        @endif

        @if ($mensagem = Session::get('sucesso-delete'))
            <div class="card amber darken-1">
                <div class="card-content white-text">
                    <span class="card-title"></span>
                    <p>{{ $mensagem }}</p>
                </div>
            </div>
        @endif

        @if ($mensagem = Session::get('sucesso-atualizar'))
            <div class="card green lighten-1">
                <div class="card-content white-text">
                    <span class="card-title"></span>
                    <p>{{ $mensagem }}</p>
                </div>
            </div>
        @endif

        @if ($mensagem = Session::get('aviso'))
            <div class="card blue">
                <div class="card-content white-text">
                    <span class="card-title"></span>
                    <p>{{ $mensagem }}</p>
                </div>
            </div>
        @endif

        @if ($itens->count() == 0)

            <div class="card orange">
                <div class="card-content white-text">
                    <span class="card-title">Carrinho Vazio</span>
                    <p>Aproveite nossas Promoções!</p>
                </div>
            </div>
        @else
            <h5>Seu carrinho possui: {{ $itens->count() }} produtos</h5>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($itens as $item)
                        <tr>
                            <td><img src="{{ $item->attributes->image }}" alt="" width="70"
                                    class="responsive-img circle "></td>
                            <td>{{ $item->name }}</td>
                            <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>

                            {{-- BTN ATUALIZAR --}}
                            <form action="{{ route('site.atualizacarrinho') }}" method="POST"
                                enctype="multipart/form-data">
                                <td><input style="width: 40px; font-weight: 700;" class="white center" min="1"
                                        type="number" name="quantity" value="{{ $item->quantity }}"></td>
                                <td>
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="btn-floating waves-effect waves-light light-blue darken-2"><i
                                            class="material-icons">refresh</i></button>
                            </form>

                            {{-- BTN REMOVER --}}
                            <form action="{{ route('site.removecarrinho') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn-floating waves-effect waves-light red darken-2"><i
                                        class="material-icons">delete</i></button>
                            </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="card orange lighten-1">
                <div class="card-content white-text">
                    <h5 style="font-weight: 600;">Valor total:</h5>
                    <span class="card-title">R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</span>
                    <p>Pague em até 12x sem juros!</p>
                </div>
            </div>

            <br>

            <div class="row container center">

                {{-- BTN CONTINUAR COMPRANDO --}}
                <a href={{ route('site.continuarcarrinho') }} class="btn waves-effect waves-light bleu accent-3">Continuar
                    comprando <i class="material-icons right">add_shopping_cart</i></a>

                {{-- BTN LIMPAR CARRINHO --}}
                <a href={{ route('site.limparcarrinho') }} class="btn waves-effect waves-light red accent-3">Limpar
                    carrinho <i class="material-icons right">clear</i></a>

                {{-- BTN FINALIZAR COMPRA --}}
                <a href="" class="btn waves-effect waves-light green accent-3">Finalizar compra <i
                        class="material-icons right">check</i></a>
            </div>
        @endif

    @endsection
