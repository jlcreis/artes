@extends ('home') @section('conteudo')

<h1> Categorias</h1>

<div class="content">
  
  @if(session('mensagem')) 
    @include ('mensagens.alerta') 
  @endif

  <table class="table table-striped table-responsive">
    @foreach ($categorias as $p)
    <tr>
      <td>{{$p->categoria}}</td>
      <td width="50">
        <form action="{{action('CategoriasController@mostra',$p->categoria, $p->id)}}" method="post">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="id" value="{{$p->id}}" />
          <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>
        </form>
      </td>
      <td width="50">
        <button type="button" id="excluir" data-toggle="modal" data-target="#delete_{{$p->id}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
        @include ('mensagens.excluir')
      </td>
    </tr>
    @endforeach
    <tr>
      <td></td>
      <td>
        <form action="{{action('CategoriasController@novo')}}">
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
        </form>
      </td>
    </tr>
  </table>
    {!! $categorias->links() !!}
</div>

@stop