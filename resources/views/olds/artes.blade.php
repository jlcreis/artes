@section('contents')
<div class="top-right links">
    @if (Auth::check())
    <a href="{{ url('/home') }}">Sair</a> @else
    <a href="{{ url('/login') }}">Login</a>
    <a href="{{ url('/register') }}">Register</a> @endif
</div>
<div class="container">
    <div class="title m-b-md">
        <a href="/">Artesanato</a>
    </div>
    
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="/home">Home</a></li>
      <li role="presentation"><a href="{{action('CategoriasController@lista')}}">Categorias</a></li>
      <li role="presentation"><a href="{{action('CategoriasController@novo')}}">Nova Categoria</a></li>
      <li role="presentation"><a href="{{action('ProdutoController@lista')}}">Produtos</a></li>
      <li role="presentation"><a href="{{action('ProdutoController@novo')}}">Novo Produto</a></li>
    </ul>
    

    <div class="links">
        <a href="/home">Home</a>
        <a href="{{action('CategoriasController@lista')}}">Categorias</a>
        <a href="{{action('CategoriasController@novo')}}">Nova Categoria</a>
        <a href="{{action('ProdutoController@lista')}}">Produtos</a>
        <a href="{{action('ProdutoController@novo')}}">Novo Produto</a>
    </div>
    @yield('conteudo')
</div>