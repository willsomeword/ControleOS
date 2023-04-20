function CadastrarEquipamento(id_form) {


    if (NotificarCamposGenerico(id_form)) {
       
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX("novoequipamento_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                //  name ,, aqui é o id 
                nome4: $("#nome4").val().trim(),
                nome1: $("#nome1").val().trim(),
                nome2: $("#nome2").val(),
                nome3: $("#nome3").val(),
                cod: $("#cod").val()
            },
            success: function (ret) {

                
                if (ret == 1) {
                    MensagemSucesso();
                    if ($("#cod").val() == "")

                    LimparCamposGenerico(id_form);
                } else {
                    MensagemErro();

                }
            }
        })
    }

    
    return false;

}


function Excluir(){

    let id_alocar_tela = $('#id_exc').val();

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX('remover_dataview'),
        data: {
            btnRemover: 'ajx',
            id_alocar: id_alocar_tela
            

        },
        success: function(ret){
            if(ret == 1){
              $("#modal-excluir").modal("hide");
              MensagemSucesso();
              CarregarEquipamentosSetor();

            } else {
                MensagemErro();
            }
        }
    })
}

function CarregarEquipamentosSetor(){
    let id_setor_tela = $("#setor").val();
    
    $.ajax({
        type: "post",
        url: BASE_URL_AJAX('remover_dataview'),
        data: {
            filtrar_equipamento_setor: 'ajx',
            idSetor: id_setor_tela
            
        },
        success: function(dados){
            $("#tableResult").html(dados);
            $("#divResult").show();
        }
        
    })
}


