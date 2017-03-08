@extends ('home')

@section ('conteudo')

<h1>Edição de Produto</h1>

<form action="/produtos/salvaEdicao/{id}" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="id" value="{{$p->id}}" />
    <div class="form-group">
        <label>Nome</label>
        <input name="nome" class="form-control" value="{{$p->nome}}"/>
    </div>
    <div class="form-group">
        <label>Descricao</label>
        <textarea rows="4" cols="50" name="descricao" type="text" class="form-control">{{$p->descricao}}</textarea>
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" class="form-control" value="{{$p->valor}}"/>
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input name="quantidade" type="number" class="form-control" value="{{$p->quantidade}}"/>
    </div>
    <div class="form-group">
        @yield('CategoriaProduto')
    </div>
    <button type="submit" class="btn btn-success btn-lg">Salvar</button>
    <a class="btn btn-danger btn-lg" href="{{action('ProdutoController@lista')}}" role="button">Cancelar</a>
</form>

@stop