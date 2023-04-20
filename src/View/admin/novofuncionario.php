<?php
require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';
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
              <h2>
                <p class="text-success">Novo Funcionario</p>
              </h2>
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

            <h6>Aqui Voce Podera cadastrar novo usuario<h6>
          </div>
          <div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">


            </div>
          </div>
          <div class="card-body">
            <form action="novofuncionario.php" id="form_equip" method="post">

              <!-- /.form-group -->
              <div class="form-group">
                <label>Tipo</label>
                <select id="tipo" name="tipo" class="form-control " onchange="Escolher(this.value, 'form_equip')">
                  <option value="">Selecione</option>
                  <option value="<?= PERFIL_ADM ?>">Administrador</option>
                  <option value="<?= PERFIL_FUNCIONARIO ?>">funcionario</option>
                  <option value="<?= PERFIL_TECNICO ?>">Tecnico</option>
                </select>
              </div>
              <div class="form-group ocultar" id="divFunc">
                <label>Setor</label>
                <select id="setor" name="setor" class="form-control" style="width: 100%;">
                </select>
              </div>
              <div class="ocultar" id="divTec">
                <label>Nome da Empresa Do Tecnico</label>
                <input id="nomeempresa" name="nomeempresa" class="form-control" placeholder="Nome da empresa">
              </div>

              <!-- /.form-group -->

              <div id="divGeral" class="ocultar">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input id="nome" name="nome" class="form-control obg" placeholder="nome">
                  </div>
                  <div class="form-group col-md-6">
                    <label>E-mail</label>
                    <input id="email" name="email" onchange="VerificarEmail(this.Value)"  class="form-control obg" placeholder="E-mail">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Telefone</label>
                    <input id="telefone" name="telefone" class="form-control obg tel" placeholder="Telefone">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Bairro</label>
                    <input id="bairro" name="bairro" class="form-control obg" placeholder="Endereço">
                  </div>
                  <div class="form-group col-md-5">
                    <label>Rua</label>
                    <input id="rua" name="rua" class="form-control obg" placeholder="Rua.">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>CEP</label>
                    <input id="cep" name="cep" class="form-control obg cep " placeholder="CEP" onblur="BuscarCep()">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Cidade</label>
                    <input id="cidade" name="cidade" readonly class="form-control obg" placeholder="Cidade">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Estado</label>
                    <input id="uf" name="uf" readonly class="form-control obg" placeholder="Estado">

                  </div>
                </div>

              </div>

              <div class="form-group ocultar" id="divButton">
                <button onclick="return NotificarCamposGenerico('form_equip')" name="btn_cadastrar" class="btn btn-primary ">Gravar</button>
              </div>

            </form>
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
  <script src="../../Resource/ajax/buscar_cep-ajx.js"></script>
  <script src="../../Resource/ajax/usuario-ajx.js"></script>
</body>

</html>