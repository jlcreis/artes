<div class="modal fade" tabindex="-1" role="dialog" id="delete_{{$f->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensagem</h4>
      </div>
    <!-- remover foto -->
      <div class="modal-body">
        <p>Deseja realmente excluir esta foto?</p>
          <img src="/img/{{$f->nome}}" alt="foto" class="img-thumbnail" width="300px">
      </div>
      <div class="modal-footer">
        <form action="{{action('ProdutoController@removeFoto')}}" method="post">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="idProduto" value="{{$p->id}}" />
          <input type="hidden" name="id" value="{{$f->id}}" />
          <input type="hidden" name="nome" value="{{$f->nome}}" />
          <button type="submit" class="btn btn-danger">Sim</span>
          </button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
        </form>
      </div>
    </div>
  </div>
</div>