function VerificarEmail(email_tela){
    if(email_tela !=""){
        $.ajax({
            type: 'post',
            url: BASE_URL_AJAX("usuario_dataview"),
            data:{
                email: email_tela,
                verificar_email : 'ajx'
            },
            success: function(ret){
                if(ret == -1){
                    MensagemGenerica("O e-mail " + email_tela + " já existe!");
                    $("#email").val('');
                    $("#email").focus();
                }
            }
        })
    }
}


function FiltrarUsuario(){


    var Nome_filtro = $("#nome_pesquisar").val();
    

    

    if(Nome_filtro != " ") {
        
        $.ajax ({
            type:  'post',
            url: BASE_URL_AJAX("usuario_dataview"),
            data:{
                nome: Nome_filtro,
                filtrar_pessoa: 'ajx'
            },
            success: function(resultado_table){
                $("#tableResult").html(resultado_table);
                $("#divResultado").show();

            }
        })


        return false;

    }
 

    
}

function MudarStatus(){
    let id = $("#id_status").val();
    let status_atual = $("#status_atual").val();
    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            id_user: id,
            status_user: status_atual,
            mudar_status: 'ajx'

        },
        success:function (ret) {
            if(ret == 1){
                MensagemSucesso();
                FiltrarUsuario($("#nome_pesquisar").val());
                $("#mudar_status").modal("hide");

            } 
            else
            MensagemErro();

        } 

    })
}