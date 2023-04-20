<?php

include_once  '_include_autoload.php';

use Src\Controller\NovoEquipamentoCTRL;
use Src\Controller\SetorCTRL;
use Src\Public\Util;
use Src\VO\AlocarVO;
use Src\VO\EquipamentoVO;
Util::VerificarLogado();

$ctrl_eq = new NovoEquipamentoCTRL();



if (isset($_POST['btnRemover'])) {
    $vo = new AlocarVO();
    $vo->setid($_POST['id_alocar']);
    $ret = $ctrl_eq->RemoverEquipamentoSetorCTRL($vo);

    if ($_POST['btnRemover'] == 'ajx')
        echo $ret;
} else if (isset($_POST['filtrar_equipamento_setor'])) {
    $equipamentos = $ctrl_eq->SelecionarEquipamentosAlocadosSetorCTRL($_POST['idSetor']);
?>


    <table class="table table-striped table-bordered table-hover">
        <div class="input-group-append">
            <thead>
                <tr>
                    <th>Equipamento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipamentos as $eq) : ?>
                    <tr class="oddgradex">
                        <td><?= $eq['nome_tipo'] . ' / ' . $eq['nome_modelo'] . ' / ' . $eq['identificacao'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#modal_excluir" button class="btn btn-danger btn-xs" onclick="CarregarModalExcluir('<?= $eq['id'] ?>' , '<?= $eq['nome_tipo'] . ' / ' . $eq['nome_modelo'] . ' / ' . $eq['identificacao'] ?>')">Remover</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>




<?php } else {

    $setores = (new SetorCTRL)->ConsultarTipoSetor();
}
