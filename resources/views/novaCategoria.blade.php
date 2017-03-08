@extends ('home')

@section ('conteudo')

<h1>Nova Categoria</h1>

<form action="{{action('CategoriasController@adiciona')}}" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-group">
        <label>Categoria</label>
        <input name="categoria" class="form-control"/>
    </div>
    <button type="submit" class="btn btn-success btn-lg">Salvar</button>
    <a class="btn btn-danger btn-lg" href="{{action('CategoriasController@lista')}}" role="button">Cancelar</a>
</form>

@stop