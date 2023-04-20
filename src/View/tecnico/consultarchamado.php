<?php 
 require_once dirname(__DIR__, 3) .'/vendor/autoload.php';
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
              <h1>Gerenciar setores</h1>
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
          <h3><p class="text-success">Consultar Chamados</p></h3>
          <h6>Consulte todos seus chamados e realize os atendimentos</h6>
        </div>
        <div>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
            </div>
            <div class="card-body">
             <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Escolha a situação</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Todos</option>
                  </select>
              </div>        
                      <td>
                       <button class="btn bg-gradient-success">Pesquisar</button>
                      </td>   
                       <div>

                       </div>    
                      <div class="row">  
                        <div class="card card-success">
                        <div class="card-header">
                        <h3 class="card-title">Resultado Encontrado</h3>
                      </div>
                    
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table class= "table table-striped table-bordered table-hover">
                            
                                <thead>
                                    <tr>
                                        <th>Data Abertura</th>
                                        <th>Funcionario</th>
                                        <th>Equipamento</th>
                                        <th>Problema</th>
                                        <th>Data Atendimento</th>
                                        <th>Data Encerramento</th>
                                        <th>Laudo</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradex">
                                    <td>Abertura</td>
                                    <td>Funcionario</td>
                                    <td>Equipamento</td>
                                    <td>Problema</td>
                                    <td>Atendimento</td>
                                    <td>Tecnico</td>
                                    <td>Encerramento</td>
                                    <td>Laudo</td>
                                    <td>
                                    <a href="#"><button class="btn btn-warning btn-xs">Ver Mais</button></a>
                                    <a href="#"><button class="btn btn-danger btn-xs">Atender</button></a>
                                    <a href="#"><button class="btn btn-warning btn-xs">Finalizar</button></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>                       
                
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

                    
              
       

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
    include_once PATH_URL . '/Template/_includes/_scripts.php'
  ?>
</body>

</html>