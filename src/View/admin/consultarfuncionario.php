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
           <h3><p class="text-success">Consultar Usuario</p></h3>
           <h6>Aqui voce consulta todos os seus usuarios</h6>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                
              
            </div>
          </div>
          <div class="card-body">
          <div class="col-md-12">
            <div class="form-group">

             <label>Pesquisar por Tipo</label>
             <input class="form-control" id="nome" name="nome" placeholder="digite aqui...">
             <div class="form-group">
            </div>
                    
          <td>
                      <button class="btn bg-gradient-success">Buscar</button>
                    </td>
                    
              </div>
          <div>
          <div class="card-body">
            <div class="row">    
              <div class="col-md-12">
                <div class="form-group">
                <div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">Equipamentos Cadastrados</h3>
              </div>
            
                <div class="panel-body">
                  <div class="table-responsive">
                     <table class= "table table-striped table-bordered table-hover">
                       <div class="input-group-append">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Setor</th>                            
                            <th>Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="oddgradex">
                            <td>{Nome}</td>
                            <td>{Setor}</td>                           
                            <td>
                              <a href=""><button class="btn btn-warning btn-xs">Alterar</button></a>
                              <a href=""><button class="btn btn-danger btn-xs">Excluir</button></a>
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