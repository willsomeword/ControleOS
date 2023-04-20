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
          <h3><p class="text-success">Mudar Senha</p></h3>
          <h6>Altere sua senha aqui</h6>
        </div>
          <div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                  
            </div>
          </div>
          <div class="card-body">
            
          <div class="form-group">
                    <label for="exampleInputPassword1">Senha atual</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                <label>Nova senha</label>
                    <input class="form-control" id="nome" name="nome" placeholder="digite aqui...">
                    <div class="form-group">
                </div>
                <label>Repetir senha</label>
                    <input class="form-control" id="nome" name="nome" placeholder="digite aqui...">
                    <div class="form-group">
                </div>
                <td>
                      <button class="btn bg-gradient-success">gravar</button>
                    </td>
                    
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