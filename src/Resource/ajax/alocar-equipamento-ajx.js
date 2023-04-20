function Alocar(id_form){
    

    if(NotificarCampos(id_form)){

        $.ajax({
            type: "post",
            url: BASE_URL_AJAX('alocar_dataview'),
            data:{
                btngravar:'ajx',
                admEquipamento: $("#id_eq").val().trim(),
                admSetor: $("#id_setor").val().trim()

            },
            success: function(dados) {

                
                
                NotificarCampos();
                RemoverLoad();

                switch(dados){
                    case '1':

                        MensagemSucesso();
                        LimparCampos(id_form);

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