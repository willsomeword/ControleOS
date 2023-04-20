<?php

use Src\Public\Util;

include_once'_include_autoload.php';

Util::VerificarLogado();
use Src\Controller\ModeloCTRL;
use Src\VO\ModeloEquipamentoVO;




$ctrl = new ModeloCTRL();


if(isset($_POST['btn_cadastrar'])){
    $vo = new ModeloEquipamentoVO();
    $vo->setnome($_POST['nome']);
    $ret = $ctrl->CadastrarModeloCTRL($vo);
    if($_POST['btn_cadastrar'] =='ajx')
    echo $ret;
    else { 
      $modelos = $ctrl->ConsultarModelosCTRL();
    }

}

else if(isset($_POST['btnAlterar'])){

    $vo = new ModeloEquipamentoVO;
    $vo->setid($_POST['id_alt']);
    $vo->setnome($_POST['nome_alt']);
    $ret = $ctrl->AlterarModeloCTRL($vo);
    if ($_POST['btnAlterar'] == 'ajx')
    echo $ret;
    else { 
      $modelos = $ctrl->ConsultarModelosCTRL();
    }

}else if(isset($_POST['btnExcluir'])){

    $vo = new ModeloEquipamentoVO;
    $vo->setid($_POST['id_exc']);

    $ret = $ctrl->ExcluirModeloCTRL($vo);
    
    if($_POST['btnExcluir'] == 'ajx')
    echo $ret;
    else { 
      $modelos = $ctrl->ConsultarModelosCTRL();
    }

} else if (isset($_POST['ConsultarAJX']) && $_POST['ConsultarAJX'] == "OK"){
  $modelos = $ctrl->ConsultarModelosCTRL();?>
   
   <table class= "table table-striped table-bordered table-hover">
        <div class="input-group-append">
          <thead>
            <tr>
             <th>Setores Cadastrados</th>                            
             <th>Ação</th>
            </tr> 
        </thead>
         <tbody>
          <?php for( $i = 0; $i < count($modelos); $i++ ):?>
             <tr class="oddgradex">
              <td><?= $modelos[$i]['nome']?></td>                            
              <td>
                <a href="#" onclick="CarregarAlteracaoTipo('<?= $modelos[$i]['id']?>','<?= $modelos[$i]['nome']?>')"class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterar_tipo">Alterar</a>
                <a href="#" onclick="CarregarModalExcluir('<?= $modelos[$i]['id']?>','<?= $modelos[$i]['nome']?>')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_excluir">Excluir</a>
              </td>
             </tr>
          <?php endfor;?>    
          </tr>
        </tbody>
   </table>
                     
<?php 
}
else if (isset($_POST['FiltrarAJX']) && isset($_POST['nome'])){


  $modelos = $ctrl->FiltrarModeloCTRL($_POST['nome']);
  ?>
     
     <table class= "table table-striped table-bordered table-hover"id="table_acert">
        <div class="input-group-append" >
          <thead>
            <tr>
             <th>Setores Cadastrados</th>                            
             <th>Ação</th>
            </tr> 
        </thead>
         <tbody>
          <?php for( $i = 0; $i < count($modelos); $i++ ):?>
             <tr class="oddgradex">
              <td><?= $modelos[$i]['nome']?></td>                            
              <td>
                <a href="#" onclick="CarregarAlteracaoTipo('<?= $modelos[$i]['id']?>','<?= $modelos[$i]['nome']?>')"class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterar_tipo">Alterar</a>
                <a href="#" onclick="CarregarModalExcluir('<?= $modelos[$i]['id']?>','<?= $modelos[$i]['nome']?>')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_excluir">Excluir</a>
              </td>
             </tr>
          <?php endfor;?>    
          </tr>
        </tbody>
   </table>
  
<?php 

} else {

      $modelos = $ctrl->ConsultarModelosCTRL();
}