<?php

include_once '_include_autoload.php';

use Src\VO\TipoEQVO;
use Src\Controller\TipoEquipamentoCTRL;
use Src\Public\Util;
Util::VerificarLogado();

$ctrl = new TipoEquipamentoCTRL();


if (isset($_POST['btn_cadastrar'])) {

  $vo = new TipoEQVO;
  $vo->setNome($_POST['nome']);
  $ret = $ctrl->CadastrarTipoEquipamento($vo);
  /**
   * se o btn cadastrar possuir o valor ajx. 
   */
  if ($_POST['btn_cadastrar'] == 'ajx')
    echo $ret;
  else {
    $tipos = $ctrl->ConsultarTipoEquipamentoCTRL();
  }
} else if (isset($_POST['btnAlterar'])) {

  $vo = new TipoEQVO;
  $vo->setId($_POST['id_alt']);
  $vo->setNome($_POST['nome_alt']);
  $ret = $ctrl->AlterarTipoEquipamento($vo);

  if ($_POST['btnAlterar'] == 'ajx')
    echo $ret;
  else {
    $tipos = $ctrl->ConsultarTipoEquipamentoCTRL();
  }
} else if (isset($_POST['btnExcluir'])) {

  $vo = new TipoEQVO;
  $vo->setId($_POST['id_exc']);
  $ret = $ctrl->ExcluirTipoEquipamento($vo);

  if ($_POST['btnExcluir'] == 'ajx')
    echo $ret;
  else {
    $tipos = $ctrl->ConsultarTipoEquipamentoCTRL();
  }
} else if (isset($_POST['ConsultarAJX']) && $_POST['ConsultarAJX'] == "OK") {
  $tipos = $ctrl->ConsultarTipoEquipamentoCTRL(); ?>

  <table class="table table-hover" id="table_result">
    <thead>
      <tr>
        <th>Tipo de equipamento</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($tipos); $i++) : ?>
        <tr class="oddgradex">
          <td><?= $tipos[$i]['nome'] ?></td>
          <td>
            <a href="#" onclick="CarregarAlteracaoTipo('<?= $tipos[$i]['id'] ?>','<?= $tipos[$i]['nome'] ?>')" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterar_tipo">Alterar</a>
            <a href="#" onclick="CarregarModalExcluir('<?= $tipos[$i]['id'] ?>','<?= $tipos[$i]['nome'] ?>')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_excluir">Excluir</a>
          </td>
        <?php endfor; ?>
        </tr>
    </tbody>
  </table>
<?php
} else if (isset($_POST['FiltrarAJX']) && isset($_POST['nome_filtro'])) {


  $tipos = $ctrl->FiltrarSetorCTRL($_POST['nome_filtro']); ?>

  <table class="table table-hover" id="table_result">
    <thead>
      <tr>
        <th>Tipo de equipamento</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 0; $i < count($tipos); $i++) : ?>
        <tr class="oddgradex">
          <td><?= $tipos[$i]['nome'] ?></td>
          <td>
            <a href="#" onclick="CarregarAlteracaoTipo('<?= $tipos[$i]['id'] ?>','<?= $tipos[$i]['nome'] ?>')" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterar_tipo">Alterar</a>
            <a href="#" onclick="CarregarModalExcluir('<?= $tipos[$i]['id'] ?>','<?= $tipos[$i]['nome'] ?>')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_excluir">Excluir</a>
          </td>
        <?php endfor; ?>
        </tr>
    </tbody>
  </table>
<?php

} else {

  $tipos = $ctrl->ConsultarTipoEquipamentoCTRL();
}
