function FiltrarEquipamento(id_form){

    let idTipo = $("#filtro_tipo").val();
    let nomePalavra =  $("#filtro_palavra").val();

    if ( NotificarCamposGenerico(id_form)){
       
        $.ajax({
            type: "post",
            url: BASE_URL_AJAX('novoequipamento_dataview'),
            data: {
                btnpesquisar: 'ajx',
                tipo_filtro: idTipo,
                nome_filtro: nomePalavra

            },
            success: function(dados){
               
                if(dados != "") {
                    $("#table_result").html(dados);
                    $("#divResult").show();
                    $("#btn_relatorio").show();

                   // $("#btn_relatorio").removeClass("ocultar");

                } else {

                    $("#btn_relatorio").hide();
                   // $("#btn_relatorio").addClass("ocultar");
                    MensagemRegistronaoencontrado();
                    $("#table_result").html('');
                    $("#divResult").hide();
                }
            }
        })
    }
    return false;
}
function imprimir(){
    let tipo = $("#filtro_tipo").val();
    let filtroPalavra = $("#filtro_palavra").val();

location = "relatorioequipamento.php?filtro=" + tipo + "&desc_filtro=" + filtroPalavra; 
}