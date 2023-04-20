<?php
require_once dirname(__DIR__, 2) . '/Resource/dataview/alocar_dataview.php';
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
                <p class="text-success">Alocar equipamento</p>
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

            <h6>Aqui voce aloca um equipamento ao setor especifico</h6>
          </div>
          <div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <form method="post" id="form_equip" action="alocarequipamento.php">
                  <div class="form-group">
                    <label>Equipamento</label>
                    <select id="admEquipamento" name="admEquipamento" class="form-control obg" style="width: 100%;">
                      <option value="selected">Selecione</option>
                      <?php foreach ($egs as $t) : ?>
                        <option value="<?= $t['id'] ?>"><?= $t['nome_modelo'] ?></option>
                      <?php endforeach; ?>
                    </select>

                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Setor</label>
                    <select id="admSetor" name="admSetor" class="form-control obg" style="width: 100%;">
                      <option value="selected">Selecione</option>
                      <?php foreach ($setores as $t) : ?>
                        <option value="<?= $t['id'] ?>"><?= $t['nome_setor'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- /.form-group -->

                  <td>
                    <button name="btngravar" class="btn btn-success" onclick="return Alocar('form_id')">pesquisar</button>
                  </td>







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
</body>

</html>