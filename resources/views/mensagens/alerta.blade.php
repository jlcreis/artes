<div class="modal fade" tabindex="-1" role="dialog" id="alerta">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensagem</h4>
      </div>
      <div class="modal-body">
        <!--p><strong>{{old('nome')}}</strong> cadastrado com sucesso.</p-->
        <p><strong>{{session('mensagem')}}</strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->