<?php

include_once '_include_autoload.php';

use Src\Controller\SetorCTRL;
use Src\Controller\UsuarioCTRL;
use Src\Public\Util;
util::VerificarLogado();
use Src\VO\TecnicoVO;
use Src\VO\FuncionarioVO;
use Src\VO\UsuarioVO;






$ctrl_setor = new SetorCTRL;
$ctrl_usuario = new UsuarioCTRL;

if (isset($_POST['carrega_setor'])) {

    $setores = $ctrl_setor->ConsultarTipoSetor(); ?>

    <select id="setor" name="setor" class="form-control" style="width: 100%;">
        <option value="">Selecione</option>
        <?php foreach ($setores as $s) { ?>
            <option value="<?= $s['id'] ?>"><?= $s['nome_setor'] ?></option>
        <?php } ?>
    </select>


<?php

} else if (isset($_POST['verificar_email']) and $_POST['verificar_email'] == 'ajx') {

    $ret = $ctrl_usuario->VerificarEmailDuplicadoCTRL(($_POST['email']));

    if ($ret)
        echo 1; //não existe
    else
        echo -1; //já existe e não deixa cadastrar o email


} else if (isset($_POST['btn_cadastrar'])) {

    switch ($_POST['tipo']) {

        case '1':

            $vo = new UsuarioVO;

            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setTipo($_POST['tipo']);

            break;

        case '2':

            $vo = new FuncionarioVO;

            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setTipo($_POST['tipo']);
            $vo->setsetor($_POST['setor']);


            break;


        case '3':

            $vo = new TecnicoVO;

            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setTipo($_POST['tipo']);
            $vo->setNomeEmpresa($_POST['nomeempresa']);

            break;
    }

    $vo->setrua($_POST['rua']);
    $vo->setcep($_POST['cep']);
    $vo->setbairro($_POST['bairro']);
    $vo->setnomecidade($_POST['cidade']);
    $vo->setsiglaestado($_POST['uf']);

    $ret = $ctrl_usuario->CadastrarUsuarioCTRL($vo);

} else if (isset($_POST['btn_alterar'])) {

    switch ($_POST['tipo']) {

        case '1':

            $vo = new UsuarioVO;
            $vo->setId($_POST['id']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setTipo($_POST['tipo']);

            break;

        case '2':

            $vo = new FuncionarioVO;

            $vo->setId($_POST['id']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setTipo($_POST['tipo']);
            $vo->setsetor($_POST['setor']);


            break;


        case '3':

            $vo = new TecnicoVO;
            $vo->setId($_POST['id']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setTipo($_POST['tipo']);
            $vo->setNomeEmpresa($_POST['nomeempresa']);




            break;
    }
    $vo->setidEndereco($_POST['idendereco']);
    $vo->setrua($_POST['rua']);
    $vo->setcep($_POST['cep']);
    $vo->setbairro($_POST['bairro']);
    $vo->setnomecidade($_POST['cidade']);
    $vo->setsiglaestado($_POST['uf']);

    $ret = $ctrl_usuario->AlterarUsuarioCTRL($vo);

    Util::chamarPagina('consultarusuario.php?nome=' . $_POST['nome'] . "&ret= $ret");

} else if (isset($_POST['filtrar_pessoa']) && $_POST['filtrar_pessoa'] == 'ajx') {
    $pessoas = $ctrl_usuario->FiltrarPessoaCTRL($_POST['nome']);
?>

    <table class="table table-striped table-bordered table-hover" id="tableResult">

        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pessoas as $p) { ?>
                <tr>
                    <td>
                        <a href="alterar_usuario.php?id_user=<?= $p['id'] ?>"class="btn btn-warning btn-xs">Alterar</a>
                        <a href="#" onclick="CarregarModalStatus('<?= $p['id'] ?>', '<?= $p['nome'] ?>', '<?= $p['status'] ?>')" data-toggle="modal" data-target="#modal-status" class="btn btn-<?= $p['status'] == STATUS_ATIVO ? "danger" : "success" ?> btn-xs"><?= $p['status'] == STATUS_ATIVO ? "INATIVAR" : "ATIVAR" ?></a>
                    </td>
                    <td><?= $p['nome'] ?></td>
                    <td><?= Util::DescricaoTipo($p['tipo']) ?></td>
                    <td><?= Util::DescricaoStatus($p['status']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


<?php } else if (isset($_POST['mudar_status']) && $_POST['mudar_status'] == 'ajx') {
    $vo = new UsuarioVO;


    $vo->setId($_POST['id_user']);
    $vo->setStatus($_POST['status_user']);

    echo $ctrl_usuario->MudarStatusCTRL($vo);
} else if (isset($_GET['id_user']) && is_numeric($_GET['id_user'])) {
    $user = $ctrl_usuario->DetalharUsuarioCTRL($_GET['id_user']);
    if (empty($user))
        Util::chamarPagina('consultarusuario.php');
    if ($user['tipo'] == PERFIL_FUNCIONARIO) {
        $setores = $ctrl_setor->ConsultarTipoSetor();
    }
} 
