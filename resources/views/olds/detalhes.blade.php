@extends ('home')

@section('conteudo')
<h1>Detalhes</h1>
<div class="panel panel-default">
    <div class="panel-body">
        <form action="/produtos/salvaEdicao/{id}" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="id" value="{{$p->id}}" />
            <div class="row">
                <div class="col-md-12">
                    <label>Nome:</label>
                    <input name="nome" class="form-control" value="{{$p->nome}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label>Valor:</label>
                    <input name="valor" class="form-control money" value="{{$p->valor}}"/>
                </div>
                <div class="col-sm-6">
                    <label>Quantidade:</label>
                    <input name="quantidade" type="number" class="form-control" value="{{$p->quantidade}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>Descricao:</label>
                    <textarea rows="4" cols="50" type="text" name="descricao" class="form-control">{{$p->descricao}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-10">
                <p>Fotos:</p>
            </div>
            <div class="col-sm-2">
                <button type="button" id="novaFoto" class="btn btn-info" >nova foto</button>
            </div>
        </div>
        <div class="row">
            @foreach ($fotos as $f)
            <div class="col-sm-3">
                <img src="/img/{{$f->nome}}" alt="foto" class="img-thumbnail">
                <button type="button" id="excluir" data-toggle="modal" data-target="#delete_{{$f->id}}" class="close"><span aria-hidden="true">&times;</span></button>
                
                @include ('mensagens.excluirFoto')
            </div>
            @endforeach
            <div class="col-sm-3">
                <div id="novaFoto">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form id="upload" action="/produtos/detalhes/adicionaFoto" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                    <input type="hidden" name="id" value="{{$p->id}}" />
                    <input type="file" id="foto" name="foto[]" onchange="this.form.submit();" style="display: none;">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <p>Categorias:</p>
            </div>
        </div>
        <dv class="row">
        <div class="row">
            @foreach ($categoriasProduto as $cp)
            <div class="col-sm-2">
                <form id="{{$cp->id}}" action="/produtos/detalhes/removeCategoria" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="idProduto" value="{{$p->id}}" />
                    <input type="hidden" name="idProdCat" value="{{$cp->idProdCat}}" />
                    <p><button type="submit" id="excluiProduto_{{$cp->id}}" class="btn btn-success btn-xs btn-block">
                        {{$cp->categoria}}</button></p>
                </form>
            </div>
            @endforeach
        </div>
        <div class="row">
            @foreach ($categorias as $c)
            <div class="col-sm-2">
                <form id="{{$c->id}}" action="/produtos/detalhes/adicionaCategoria" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="idProduto" value="{{$p->id}}" />
                    <input type="hidden" name="id" value="{{$c->id}}" />
                    <p><button type="submit" id="adicionaProduto_{{$c->id}}" class="btn btn-default btn-xs btn-block">
                        {{$c->categoria}}</button></p>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop