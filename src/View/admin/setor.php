<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/setor_dataview.php';
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include_once PATH_URL . '/Template/_includes/_head.php';
  ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <?php
    include_once PATH_URL . '/Template/_includes/_topo.php';
    include_once PATH_URL . '/Template/_includes/_menu.php';
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-10">
            <div class="col-sm-60">
            <h3><p class="text-success">Gerenciar tipo de Setores</p></h3>
            </div>
            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                <li class="breadcrumb-item active">Gerenciar setores</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
          <h3 class="card-title">Gerencie os tipos de equipamentos aqui</h3>
          </div>
          <div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>

            </div>
          </div>
          <div class="card-body">

            <form method="post" action="setor.php"> 
              <div class="form-group">

                <label>nome do setor </label>
                <input class="form-control" id="nome" name="nome" placeholder="digite aqui...">
              </div>
              <button class="btn btn-success" onclick="return NotificarCampoObrigatorio('form_cad')" name="btn_cadastrar">Cadastrar</button>

            </form>
            </div>
            <div class="card-body">
             <div class="row">    
              <div class="col-12">
                <div class="form-group">
                <div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">Tipos de setores</h3>
              
                  <div class="card-tools">
                      <div class="input_group input-group-sm" style="width: 350px;">
                          <input type="text" onkeyup="FiltrarTipo(this.value)" name="table_search" class="form-control float-right" placeholder="Digite para fazer consulta">


                      </div>

                  </div>
            </div>
                <div class="panel-body">
                  <div class="table-responsive">
                     <table class= "table table-striped table-bordered table-hover" id="table_acert">
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
                            <?php endfor;?>
                          </tr>
                        </tbody>
                      </table>
                      <form action="setor.php" method="post">
                        <?php include_once 'modal/_alterar_tipo.php'?>
                        
                      </form>
                        <form action="setor.php" method="post">
                          <?php include_once 'modal/_excluir.php'?>  
                        </form>
                    </div>
                  </div>
                </div> 
                <!-- /.card-body -->
              </div>
              <!-- /.cartão -->
            </div>
          </div>
        </div>
        <!-- /.cartão -->




    
                <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    include_once PATH_URL . '/Template/_includes/_footer.php';
    ?>


  </div>
  <!-- ./wrapper -->

  <?php
  include_once PATH_URL . '/Template/_includes/_scripts.php';
  include_once PATH_URL . '/Template/_includes/_msg.php';
  ?>
  <script src="../../Resource/ajax/tipo_setor-ajx.js"></script>
 


</body>

</html>