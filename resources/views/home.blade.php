@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Administrador
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills">
                      <li role="presentation"><a href="/home">Home</a></li>
                      <li role="presentation"><a href="{{action('CategoriasController@lista')}}">Categorias</a></li>
                      <li role="presentation"><a href="{{action('CategoriasController@novo')}}">Nova Categoria</a></li>
                      <li role="presentation"><a href="{{action('ProdutoController@lista')}}">Produtos</a></li>
                      <li role="presentation"><a href="{{action('ProdutoController@novo')}}">Novo Produto</a></li>
                    </ul>
                    @yield('conteudo') 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
