<div class="modal fade" id="modal-status">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Mudar Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="id_status" type="hidden" name="id_status">
                    <input id="status_atual" type="hidden" name="status_atual">
                    <label>Deseja mudar o status do usuário: </label> <b><span id="nome_user_status"></span></b>

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-outline-dark" name="btnMudarStatus" onclick="return MudarStatus()" >Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog-->
</div>