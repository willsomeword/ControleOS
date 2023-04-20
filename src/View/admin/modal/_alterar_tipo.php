<div class="modal fade" id="modal_excluir">
  <div class="modal-dialog">
    <div class="modal-content bg-success">
      <div class="modal-header">
        <h4 class="modal-title">Confirmação de exclusao</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input id="id_exc" type="hidden" name="id_exc">
          <label>Deseja excluir o registro:</label> <span id="nome_reg"></span>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-outline-dark"  name="btnExcluir" onclick="return Excluir(this.value)">Sim</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>