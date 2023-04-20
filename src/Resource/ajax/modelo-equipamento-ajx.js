function ConsultarTipo() {
  
    $.ajax({
        type:"POST ",
        url:BASE_URL_AJAX("modelo_dataview"),
        data:{
            consultarAJX:'OK'

        }, success: function(tabela_preenchida){
            $("#table_result").html(tabela_preenchida);
        }
    })

    return false;

}

function ExcluirTipo(){

    let id = $("#id_exc").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX ("modelo_dataview"),
        data:{
            btnExcluir:'ajx',
            id_exc: id
        },
        success: function(ret){
            $("#modal_excluir").modal("hide");
            switch (ret) {
                case'1':
                    MensagemSucesso();
                    //LimparCampos (id_form);
                    ConsultarTipo ();
                    break;
                case '-1':
                    mesangemExcluirUso();
            
                    break;
            }        
        }
    })

    return false;
}


function AlterarTipo(){


    let nome = $("#nome_alt").val();
    let id = $("#id_alt").val();

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            btnAlterar: 'ajx',
            id_alt: id,
            nome_alt: nome
        }, success: function(ret){
            $("#alterar_tipo").modal("hide");
            switch (ret){
                case'1':
                    messagemSucesso();
                    //LimparCampos (id_form);
                    ConsultarTipo ();
                    break;
                case '-1':
                    mesangemErro();
                    break;
                    

            }
        }
    })
    return false;
}






function cadastrartipo(id_form){
    /**
     * configuração do ajax para ser chamado nas paginas adjacentes. 
     * essa é a chamada da funcao.
     */
    
    if(NotificarCamposGenerico(id_form)){

        let nome_ca = $("#nome").val();

    
        $.ajax({
             type:"POST",
             url:BASE_URL_AJAX("modelo_dataview"),
             data:{
               btn_cadastrar:'ajx',
               nome: nome_ca
              },

        /** 
         * posteriormente confirmado a configuração o success entra em ação 
         *como o success é apenas chamada, 
        */
             success: function(ret) {
               
                NotificarCampos();
                RemoverLoad();
               
                switch(ret){
                    case '1':
                        MensagemSucesso();
                        LimparCampos(id_form);
                        ConsultarTipo();
                    break;
                    
                    case'-1':
                        MensagemErro()
                    break;

                }
               
             }
        })
        

    }

    return false;
}


function FiltrarTipo(nome){
    
    if(nome.length > 2){ 
        
       

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX ("modelo_dataview"),
        data:{
            FiltrarAJX:'ajx',
            nome: nome
            
        },
        success: function(dados){
            $("#table_acert").html(dados);
                  
        }
    })

  }else{
    $("#table_acert").html('');
  }
}