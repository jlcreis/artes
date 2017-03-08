@extends ('home')

@section ('conteudo')

<h1>Novo Produto</h1>

<form action="{{action('ProdutoController@adiciona')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
    <div class="form-group">
        <label>Nome</label>
        <input name="nome" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Descricao</label>
      <textarea rows="4" cols="50" type="text" name="descricao" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" class="form-control money"/>
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input name="quantidade" type="number" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Fotos</label>
        <div id="fotos">
            <input type="file" class="filestyle" name="foto[]"/>
            <input type="file" class="filestyle" name="foto[]"/>
            <input type="file" class="filestyle" name="foto[]"/>
            <input type="file" class="filestyle" name="foto[]"/>
            <input type="file" class="filestyle" name="foto[]"/>
        </div>    
    </div>
    
    <div class="form-group">
        @yield('categoriaProduto')
    </div>
    <button type="submit" class="btn btn-success btn-lg">Salvar</button>
    <a class="btn btn-danger btn-lg" href="{{action('ProdutoController@lista')}}" role="button">Cancelar</a>
</form>

@stop