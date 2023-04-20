<?php

$tipo = '';
$modelo = '';
require_once dirname(__DIR__, 2) . '/Resource/dataview/novoequipamento_dataview.php';
?>


<!DOCTYPE html>
<html>

<head>
  <?php
  include_once PATH_URL . '/Template/_includes/_head.php'
  ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <?php
    include_once PATH_URL . '/Template/_includes/_topo.php';
    include_once PATH_URL . '/Template/_includes/_menu.php'
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $id == '' ? 'Novo' : 'Alterar' ?> Equipamento</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                <li class="breadcrumb-item active"><?= $id == '' ? 'Cadastro' : 'Alteração' ?> do Equipamento</li>
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
            <h3 class="card-title">Aqui você poderá <?= $id == '' ? 'Cadastrar' : 'Alterar' ?> seus equipamentos</h3>

          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <form method="post" id="form_cad" action="equipamento.php">
                  <input type="hidden" id="cod" name="cod" value="<?= $id ?>">
                  <!-- quando o id for alterar ele ira popular esse hightfield com o cod -->
                  <div class="form-group">

                    <label>Tipo do Equipamento</label>
                    <select id="nome3" name="nome3" class="form-control obg" style="width: 100%;">
                      <option value="">Selecione</option>
                      <?php foreach ($tipos as $t) : ?>
                        <option value="<?= $t['id'] ?>" <?= $id == '' ? '' : ($dados['tipoequip_id'] == $t['id'] ? 'selected' : '') ?>><?= $t['nomeequip'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Modelo</label>
                  <select id="nome2" name="nome2" class="form-control obg" style="width: 100%;">
                    <option value="">Selecione</option>
                    <?php foreach ($modelos as $t) : ?>
                      <option value="<?= $t['id'] ?>" <?= $id == '' ? '' : ($dados['modeloequip_id'] == $t['id'] ? 'selected' : '') ?>><?= $t['nome'] ?></option>
                      <!-- tenar, o id é iugal a vazio é se e entao nao faz nada senao o modelo que eu quero alterar daquela vez eu quero alterar  -->
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            </div>
            <label>Identificação</label>
            <input class="form-control obg" placeholder="Digite aqui" id="nome4" name="nome4" value="<?= $id == '' ? '' : $dados['identificacao'] ?>"><br>
            <label>Descrição</label>
            <textarea class="form-control obg" rows="3" name="nome1" id="nome1" placeholder="Digite aqui"><?= $id == '' ? '' : $dados['descricao'] ?></textarea><br>
            <button class="btn btn-success" onclick="return CadastrarEquipamento('form_cad')" name="btn_cadastrar">Gravar</button>
          </div>


         </form>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  </div>
  </div>
  <!-- /.card -->

  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  include_once PATH_URL . '/Template/_includes/_footer.php'
  ?>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php
  include_once PATH_URL . '/Template/_includes/_scripts.php';
  include_once PATH_URL . '/Template/_includes/_msg.php';
  ?>
  <script src="../../Resource/ajax/equipamento-ajx.js"></script>
</body>

</html>