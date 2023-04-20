function ConsultarTipo() {
  
    $.ajax({
        type:"POST ",
        url:BASE_URL_AJAX("tipoequipamento_dataview"),
        data:{
            consultarAJX:'OK',
        }, success: function(tabela_preenchida){
            $("#table_result_tipo").html(tabela_preenchida);
        }
    })

    return false;

}

function ExcluirTipo(){
    let id = $("#id_exc").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX ("tipoequipamento_dataview"),
        data:{
            btnExcluir:'ajx',
            id_exc: id
        },success: function(ret){
            $("#modal_excluir").modal("hide");
            switch (ret) {
                case'1':
                    messagemSucesso();
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
        url: BASE_URL_AJAX("tipoequipamento_dataview"),
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






function cadastrartipo(){
    /**
     * configuração do ajax para ser chamado nas paginas adjacentes. 
     * essa é a chamada da funcao.
     */

    if(NotificarCampos(id_form)){

        let nome_cad = $("#nome").val();

    
        $.ajax({
             type:"POST",
             url:BASE_URL_AJAX("tipoequipamento_dataview"),
             data:{
               btn_cadastrar:'ajx',
               nome: nome_cad
              },

        /** 
         * posteriormente confirmado a configuração o success entra em ação 
         *como o success é apenas chamada, 
        */
             success: function(ret) {

                RemoverLoad();
               
                switch(ret){
                    case '1':
                        messagemSucesso();
                        LimparCampos(id_form);
                        ConsultarTipo();
                    break;
                    
                    case'-1':
                    mesangemErro()
                    break;

                }
               
             }
        })
        

    }

    return false;
}


function FiltrarTipoEquipamento(nome_filtro){
    
    if(nome_filtro.length > 3){ 
      
       

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX ("tipoequipamento_dataview"),
        data:{
            FiltrarAJX:'ajx',
            nome_filtro: nome_filtro
            
        },
        success: function(dados){
            $("#table_result").html(dados);
                  
        }
    })

  }else{
    $("#table_result").html('');
  }
   
}