<?php

use Src\Public\Util;

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
              <h3>
                <p class="text-success">Aqui Voce Consulta Todos Usuarios Cadastrado</p>
              </h3>
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
            <h3 class="card-title">Gerencie os usuarios aqui</h3>
          </div>
          <div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>

            </div>
          </div>
          <div class="card-body">

            <form method="post" action="consultarusuario.php">
              <div class="form-group">

                <label>Pesquisar pelo Nome </label>
                <input onkeyup="FiltrarUsuario()" class="form-control  " id="nome_pesquisar" name="nome_pesquisar" placeholder="digite aqui...">
              </div>
            </form>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <div class="card card-success ocultar" id="divResultado">
                    <div class="card-header">
                      <h3 class="card-title">Usuarios Cadastrado</h3>
                    </div>

                    <div class="panel-body">
                      <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-bordered table-hover" id="tableResult">
                        </table>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.cartão -->
                </div>
              </div>
            </div>
            <!-- /.cartão -->
            <?php
            include_once 'modal/_mudar_status.php';
            ?>





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
  <script src="../../Resource/ajax/usuario-ajx.js"></script>


  <!-- ./essa funcao ja roda no momento que carrega a   pagina-->




</body>

</html>