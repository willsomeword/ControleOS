<?php


include_once'_include_autoload.php';


use Src\Controller\SetorCTRL;
use Src\Public\Util;
use Src\VO\SetorVO;
Util::VerificarLogado();

$ctrl = new SetorCTRL();


if(isset($_POST['btn_cadastrar'])){
    $vo = new SetorVO();
    $vo->setNomeSetor($_POST['nome']);
    $ret = $ctrl->CadastrarSetor($vo);
    if($_POST['btn_cadastrar'] =='ajx')
    echo $ret;
    else { 
      $tipos = $ctrl->ConsultarTipoSetor();
    }

}

else if(isset($_POST['btnAlterar'])){

    $vo = new SetorVO;
    $vo->setid($_POST['id_alt']);
    $vo->setNomeSetor($_POST['nome_alt']);
    $ret = $ctrl->AlterarTipoSetor($vo);
    if ($_POST['btnAlterar'] == 'ajx')
    echo $ret;
    else { 
      $tipos = $ctrl->ConsultarTipoSetor();
    }

}else if(isset($_POST['btnExcluir'])){

    $vo = new SetorVO;
    $vo->setid($_POST['id_exc']);

    $ret = $ctrl->ExcluirTipoSetor($vo);
    
    if($_POST['btnExcluir'] == 'ajx')
    echo $ret;
    else { 
      $tipos = $ctrl->ConsultarTipoSetor();
    }

} else if (isset($_POST['ConsultarAJX']) && $_POST['ConsultarAJX'] == "OK"){
  $tipos = $ctrl->ConsultarTipoSetor();?>
   
   <table class= "table table-striped table-bordered table-hover">
        <div class="input-group-append">
          <thead>
            <tr>
             <th>Setores Cadastrados</th>                            
             <th>Ação</th>
            </tr> 
        </thead>
         <tbody>
          <?php for( $i = 0; $i < count($tipos); $i++ ):?>
             <tr class="oddgradex">
              <td><?= $tipos[$i]['nome_setor']?></td>                            
              <td>
                <a href="#" onclick="CarregarAlteracaoTipo('<?= $tipos[$i]['id']?>','<?= $tipos[$i]['nome_setor']?>')"class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterar_tipo">Alterar</a>
                <a href="#" onclick="CarregarModalExcluir('<?= $tipos[$i]['id']?>','<?= $tipos[$i]['nome_setor']?>')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_excluir">Excluir</a>
              </td>
             </tr>
          <?php endfor;?>    
          </tr>
        </tbody>
   </table>
                     
<?php 
}
else if (isset($_POST['FiltrarAJX']) && isset($_POST['nome'])){


  $tipos = $ctrl->FiltrarTipoCTRL($_POST['nome']);?>
     
     <table class= "table table-striped table-bordered table-hover"id="table_acert">
        <div class="input-group-append" >
          <thead>
            <tr>
             <th>Setores Cadastrados</th>                            
             <th>Ação</th>
            </tr> 
        </thead>
         <tbody>
          <?php for( $i = 0; $i < count($tipos); $i++ ):?>
             <tr class="oddgradex">
              <td><?= $tipos[$i]['nome_setor']?></td>                            
              <td>
                <a href="#" onclick="CarregarAlteracaoTipo('<?= $tipos[$i]['id']?>','<?= $tipos[$i]['nome_setor']?>')"class="btn btn-warning btn-xs" data-toggle="modal" data-target="#alterar_tipo">Alterar</a>
                <a href="#" onclick="CarregarModalExcluir('<?= $tipos[$i]['id']?>','<?= $tipos[$i]['nome_setor']?>')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_excluir">Excluir</a>
              </td>
             </tr>
          <?php endfor;?>    
          </tr>
        </tbody>
   </table>
  
<?php 

} else {

      $tipos = $ctrl->ConsultarTipoSetor();
}