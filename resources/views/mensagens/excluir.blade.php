<div class="modal fade" tabindex="-1" role="dialog" id="delete_{{$p->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensagem</h4>
      </div>
      <!-- remover produtos -->
      @if(isset($p->nome))
      <div class="modal-body">
        <p>Deseja realmente excluir <strong>{{$p->nome}}</strong>?</p>
      </div>
      <div class="modal-footer">
        <form action="{{action('ProdutoController@remove')}}" method="post">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="id" value="{{$p->id}}" />
          <button type="submit" class="btn btn-danger">Sim</span>
          </button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
        </form>
      </div>
      @endif 
      <!-- remover categorias -->
      @if(isset($p->categoria))
      <div class="modal-body">
        <p>Deseja realmente excluir <strong>{{$p->categoria}}</strong>?</p>
      </div>
      <div class="modal-footer">
        <form action="{{action('CategoriasController@remove')}}" method="post">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="id" value="{{$p->id}}" />
          <button type="submit" class="btn btn-danger">Sim</span>
          </button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
        </form>
      </div>
      @endif
    </div>
  </div>
</div>