<?php
require_once dirname(__DIR__, 2) . '/Resource/dataview/remover_dataview.php';
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
                <p class="text-success">Remover Equipamento</p>
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

            <h6>Aqui voce podera remover seus equipamentos</h6>
          </div>
          <div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            </div>
            <div class="card-header">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group equip">
                    <label>Setor</label>
                    <select class="form-control obg" id="setor" name="setor" onchange="CarregarEquipamentosSetor()" style="width: 100%;">
                      <option selected="selected">Selecione</option>
                      <?php foreach ($setores as $t) : ?>
                        <option value="<?= $t['id'] ?>"><?= $t['nome_setor'] ?></option>
                      <?php endforeach; ?>

                    </select>
                  </div>

                </div>
              </div>
            </div>
            <div class="card-body ocultar" id="divResult" >
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">Lista de Equipamento deste Setor</h3>
                      </div>

                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="tableResult">
                          </table>
                        </div>
                        <?php include_once 'modal/_alterar_tipo.php'?>
                      </div>
                    </div>
                    <!-- /.card-body -->
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
  include_once PATH_URL . '/Template/_includes/_scripts.php';
  include_once PATH_URL . '/Template/_includes/_msg.php';
  ?>
  <script src="../../Resource/ajax/equipamento-ajx.js"></script>
</body>

</html>