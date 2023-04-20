<?php


include_once '_include_autoload.php';


use Src\Controller\ModeloCTRL;
use Src\Controller\NovoEquipamentoCTRL;
use Src\VO\EquipamentoVO;
use Src\Controller\TipoEquipamentoCTRL;
use Src\Model\SQL\NovoEquipamento;
use Src\Public\Util;
Util::VerificarLogado();

$id = '';

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

  $ctrl = new NovoEquipamentoCTRL;
  $id = $_GET['cod'];
  $dados = $ctrl->DetalharEquipamentoCTRL($_GET['cod']);

  if (empty($dados))

    Util::chamarPagina("Consultarequipamento.php");

  else {
    $tipos = (new TipoEquipamentoCTRL)->ConsultarTipoEquipamentoCTRL();
    $modelos = (new ModeloCTRL)->ConsultarModelosCTRL();
  }
} else if (isset($_POST['btn_cadastrar'])) {

  $ctrl = new NovoEquipamentoCTRL();
  $vo = new EquipamentoVO();


  $vo->setidentificacao($_POST['nome4']);
  $vo->setdescricao($_POST['nome1']);
  $vo->setmodeloid($_POST['nome2']);
  $vo->settipoid($_POST['nome3']);
  $vo->setid($_POST['cod']);
  #PEGA O VALOR  QUE TA CHEGANDO NO COD , QUE FOI SETADO NA TELA. 

  if (empty($vo->getid())) :
    $ret = $ctrl->NovoEquipamentoCTRL($vo);
  else :
    $ret = $ctrl->AlterarEquipamentoCTRL($vo);

  endif;

  $tipos = (new TipoEquipamentoCTRL)->ConsultarTipoEquipamentoCTRL();
  $modelos = (new ModeloCTRL)->ConsultarModelosCTRL();


  if ($_POST['btn_cadastrar'] == 'ajx')
    echo $ret;
} else if (isset($_POST['btnpesquisar'])) {

  $tipo_filtro = $_POST['tipo_filtro'];
  $nome_filtro = $_POST['nome_filtro'];
  $ctrl = new NovoEquipamentoCTRL();

  $equips = $ctrl->FiltrarEquipamentoCTRL($tipo_filtro, $nome_filtro);
?>

  <table class="table table-striped table-bordered table-hover" id="table_result">
    <thead>
      <tr>
        <th>Tipo</th>
        <th>Modelo</th>
        <th>Identificação</th>
        <th>Descrição</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($equips as $e) : ?>
        <tr class="oddgradex">
          <td><?= $e['nome_tipo'] ?></td>
          <td><?= $e['nome_modelo'] ?></td>
          <td><?= $e['identificacao'] ?></td>
          <td><?= $e['descricao'] ?></td>
          <td>
            <a href="equipamento.php?cod=<?= $e['id'] ?>"><button class="btn btn-warning btn-xs">Alterar</button></a>
            <a href=""><button class="btn btn-danger btn-xs">Excluir</button></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>


<?php } else {
  $tipos = (new TipoEquipamentoCTRL)->ConsultarTipoEquipamentoCTRL();
  $modelos = (new ModeloCTRL)->ConsultarModelosCTRL();
} ?>