<!DOCTYPE html>
<html lang="ptbr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #ede7f6;
        }
    </style>
</head>

<body>
<!-- Dropdown categorias-->
  <ul id='dropdown1' class='dropdown-content deep-purple lighten-5'>
    @foreach ($categoriasMenu as $categoriaM)
        <li><a href="{{ route('site.categoria', $categoriaM->id) }}" style="color: purple;">{{ $categoriaM->nome }}</a></li>
    @endforeach
    </ul>
<!-- Dropdown login-->
  <ul id='dropdown2' class='dropdown-content deep-purple lighten-5'>
        <li><a href="{{ route('admin.dashboard') }}" style="color: purple;"> Dasboard </a></li>
        <li><a href="{{ route('login.logout') }}" style="color: purple;"> Sair </a></li>
    </ul>

    </ul>

    <nav class="deep-purple">
        <div class="nav-wrapper container">
            <a href="{{ route('site.index') }}" class="brand-logo center">Projeto Laravel</a>

            <ul id="nav-mobile" class="left">
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <li><a href="" class="dropdown-trigger" data-target='dropdown1'> Categorias <i
                            class="material-icons right">expand_more</i> </a></li>
                <li><a href="{{ route('site.carrinho') }}">Carrinho <span class="new badge blue" data-dadge-caption="">
                            {{ \Cart::getContent()->count() }} </span></a></li>
            </ul>

            @auth
                <ul id="nav-mobile" class="right">
                    <li><a href="" class="dropdown-trigger" data-target='dropdown2'> Olá
                            {{ auth()->user()->firtName }} <i class="material-icons right">expand_more</i> </a></li>
                </ul>
            @else
                <ul id="nav-mobile" class="right">
                    <li><a href="{{route('login.form')}}"> Login <i class="material-icons right">login</i> </a></li>
                <ul id="nav-mobile" class="right">
                    <li><a href="{{route('login.create')}}"> Cadastro <i class="material-icons right">login</i> </a></li>
            @endauth

        </div>
    </nav>
    </nav>

    @yield('conteudo')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });
    </script>

</body>

</html>
