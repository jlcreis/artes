
@extends ('home')

@section('conteudo')

<h1>Produtos</h1>

<div class="content">
    
    @if(session('mensagem'))
        @include ('mensagens.alerta')
    @endif

    @if (empty($produtos))
    <div class="alert alert-danger">
            <h1>Nenhum registro encontrado</div>
        </div>
    @else

    <table class="table table-striped table-responsive">
        <tr>
            <th>Nome</th>
            <th>Valor</th> 
            <th>Quantidade</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($produtos as $p)
        <tr>
            <td>{{$p->nome}}</td>
            <td><div class="money">{{$p->valor}}</div></td>
            <td>{{$p->quantidade}}</td>
            <td width="50">
                <form action="{{action('ProdutoController@mostra',$p->id )}}" method="get">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="id" value="{{$p->id}}" />
                    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>
                </form>
            </td>
            <!--td width="50">
                <form action="{{action('ProdutoController@edita', $p->id)}}" method="get">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="id" value="{{$p->id}}" />
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                </form>
            </td-->
            <td width="50">
                <button type="button" id="excluir" data-toggle="modal" data-target="#delete_{{$p->id}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                @include ('mensagens.excluir')
            </td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <form action="{{action('ProdutoController@novo')}}">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
                </form>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    @endif
    {!! $produtos->links() !!}
</div>
@stop