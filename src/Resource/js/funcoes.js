function Load() {
    $("#divload").addClass("overlay dark").html('<i class="fas fa-2x fa-sync-alt fa-spin"></i>');

}
function RemoverLoad() {
    $("#divload").removeClass("overlay dark").html('');

}


function NotificarCampoObrigatorio(nome_id) {

    if ($("#" + nome_id).val().trim() == '')
        $("#" + nome_id).addClass("is-invalid");
    else
        $("#" + nome_id).removeClass("is-invalid").addClass('is-valid');
}


function NotificarCampos(form_id) {

    var ret = true;


    $("#" + form_id + "  input, " + "#" + form_id + " select, " + "#" + form_id + " textarea ").each(function () {

        if ($(this).hasClass("obg")) {

            if ($(this).val().trim() == "") {
                ret = false;
                $(this).addClass("is-invalid");

            } else {

                $(this).removeClass("is-invalid").addClass('is-valid');
            }


        }


    })

    if (!ret)
        MensagemCamposObrigatorio();
    else
        Load();

    return ret;
}
/**
 * atraves desse elemento ele faz o form ir para o html. entao cada elemento 
 * que ele encontrar,  que representar pelo this. o valor sera vazio.
 */
function LimparCampos(form_id) {
    $("#" + form_id + " input," + "#" + form_id + " select, " + "#" + form_id + "  textarea").each(function () {
        $(this).removeClass("is-invalid");
        $(this).removeClass("is-valid");
    })

}

function CarregarAlteracaoTipo(id, nome) {

    $("#id_alt").val(id);
    $("#nome_alt").val(nome);
}


function CarregarModalExcluir(id, nome) {

    $("#id_exc").val(id);
    $("#nome_reg").html(nome);
}

function CarregarModalStatus(id, nome, status_atual) {

    $("#id_status").val(id);
    $("#status_atual").val(status_atual);
    $("#nome_user_status").html(nome);
}

function carregarsetores(){

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX('usuario_dataview'),
        data: {
            carrega_setor: 'ajx'
        },
        success: function (dados) {
            $("#setor").html(dados);
        }
    })

}





function BASE_URL_AJAX(dataview) {
    return "../../Resource/dataview/" + dataview + ".php";
}

function Escolher(tipo) {

   

    switch (tipo) {

        case '2':
            $("#divFunc").show();
            $("#divGeral").show();
            $("#divButton").show();
            $("#divTec").hide();
            $("#setor").addClass("obg");
            
            carregarsetores();

            break;
            
        case '1' :
            $("#divTec").hide();
            $("#divFunc").hide();
            $("#divGeral").show();
            $("#divButton").show();
            $("#setor").removeClass("obg");
            break;
            
        case '3':

             $("#divTec").show();
             $("#divFunc").hide();
             $("#divGeral").show();
             $("#divButton").show();
             
            break;
        
        default:
            $("#divFunc").hide();
            $("#divGeral").hide();
            $("#divButton").hide();
            $("#divTec").hide();
            break;

    }

}
function Load() {
    $("#divLoad").addClass("overlay dark").html('<div class="overlay dark"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>');
}
function RemoverLoad() {
    $("#divLoad").removeClass("overlay dark").html('');
}
function BASE_URL_AJAX(dataview) {
    return "../../resource/dataview/" + dataview + ".php";
}
function ChamarOutraPagina(pagina){
    window.location.replace(pagina + ".php");
}
function NotificarCampo(nome_id) {
    if ($("#" + nome_id).val().trim() == '')
        $("#" + nome_id).addClass("is-invalid");
    else
        $("#" + $nome_id).removeClass("is-invalid").addClass("is-valid");
}
function NotificarCamposGenerico(form_id) {
    var ret = true;
    $("#" + form_id + " input, select, textarea ").each(function () {
        if ($(this).hasClass("obg")) {
            if ($(this).val().trim() == "") {
                ret = false;
                $(this).addClass("is-invalid");
            } else {
                $(this).removeClass("is-invalid").addClass("is-valid");
            }
        }
    })
    if (!ret)
        MensagemCamposObrigatorio();
    else
        Load();
    return ret;
}
function LimparCamposGenerico(form_id) {

    $("#" + form_id + " input, select, textarea ").each(function () {
        if ($(this).hasClass("obg")) {
            $(this).val('');
        }
        if($(this).hasClass("is-invalid")){
            $(this).removeClass("is-invalid");
        }else{
            $(this).removeClass("is-valid");
        }
    })
}
function CarregarAlteracaoTipoEquipamento(id, nome) {
    $("#modalTipoID").val(id);
    $("#modalTipoNome").val(nome);
}
function CarregarAlteracaoSetor(id, nome) {
    $("#modalSetorID").val(id);
    $("#modalSetorNome").val(nome);
}
function CarregarAlteracaoModelo(id, nome) {
    $("#modalModeloID").val(id);
    $("#modalModeloNome").val(nome);
}
function CarregarModalRemover(id, nome) {
    $("#modalRemoverID").val(id);
    $("#modalRemoverNome").html(nome);
}


function CarregarModalStatus(id, nome, status_atual)
{ 
    $('#id_status').val(id);
    $('#status_atual').val(status_atual);
    $('#nome_user_status').html(nome);  
}
function LimparNotificarCamposGenerico(form_id){

    $("#" + form_id + " input, select, textarea ").each(function () {
        $(this).removeClass("is-invalid");
        $(this).removeClass("is-valid");
    })
}

function CarregarSetores()
{
    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            carregaSetor: "ajx"
        },
        success: function (dados) {
            $("#Setor").html(dados);
        }
    })
}

function EscolherUsuario(tipo,form_id) {

    LimparNotificarCamposGenerico(form_id);

    switch (tipo) {

        case '1':
            $("#divFunc").hide();
            $("#divTec").hide();
            $("#divGeral").show();
            $("#divButton").show();
            $("#admSetor").removeClass("obg");
            $("#divTec").removeClass("obg");
            break;

        case '2':
            $("#divNome").show();
            $("#divFunc").show();
            $("#divGeral").show();
            $("#divButton").show();
            $("#admSetor").hasClass("obg");
            $("#divTec").removeClass("obg");
            CarregarSetores();
            break;

        case '3':
            $("#divFunc").hide();
            $("#divTec").show();
            $("#divEmp").show();
            $("#divGeral").show();
            $("#divButton").show();
            $("#admSetor").removeClass("obg");
            $("#divTec").hasClass("obg");
            break;

        default:
            $("#divTec").hide();
            $("#divNome").hide();
            $("#divFunc").hide();
            $("#divGeral").hide();
            $("#divButton").hide();
            break;
    }
}
