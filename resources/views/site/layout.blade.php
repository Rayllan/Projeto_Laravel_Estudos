<!DOCTYPE html>
<html lang="ptbr">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    
<body>

    <nav class="red">
        <div class="nav-wrapper container">
          <a href="#" class="brand-logo center">Projeto Laravel</a>
          <ul id="nav-mobile" class="left">
            <li><a href="">Home</a></li>
            <li><a href="">Carrinho</a></li>

          </ul>
        </div>
      </nav>

      @yield('conteudo')
</body>

</html>