<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Artesanato</title>

        <!-- estilo -->
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">

        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        
        <link href="/css/estiloPublico.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Área privada</a>
            @else
                <a href="{{ url('/login') }}">Administrador</a>
            @endif
        </div>
        <div class="container">
            <div class="title m-b-md">
                <a href="/">Artesanato</a>
            </div>
                
            <div class="links">
                <a href="/">Destaques</a>
                <a href="/quem_somos">Quem Somos</a>
                <a href="/onde_comprar">Onde comprar</a>
            </div>
            
            @yield('conteudo')
        </div> 
        
    <!-- Scripts -->    
    <script type="text/javascript" src="/jquery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/jquery/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/scriptPublico.js"></script>
        
    </body>
    
</html>