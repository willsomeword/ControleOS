<?php

include_once  '_include_autoload.php';

use Src\Controller\NovoEquipamentoCTRL;
use Src\Controller\SetorCTRL;
use Src\Public\Util;
use Src\VO\AlocarVO;
use Src\VO\EquipamentoVO;
Util::VerificarLogado();

$ctrl_eq = new NovoEquipamentoCTRL();
$setores = (new SetorCTRL)->ConsultarTipoSetor();


if(isset($_POST['btngravar'])){
    $id_eq = $_POST['admEquipamento'];
    $id_setor = $_POST['admSetor'];
    $vo = new AlocarVO();
    $vo->setequipamentoid($id_eq);
    $vo->setidSetor($id_setor);
    $ret = $ctrl_eq->AlocarEquipamentoCTRL($vo);
}

$egs = $ctrl_eq->SelecionarEquipamentosNaoAlocadosCTRL();
