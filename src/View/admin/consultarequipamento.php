<?php
if (isset($_POST['btn_buscar'])) :

  echo 'clicou';

endif;


require_once dirname(__DIR__, 2) . '/Resource/dataview/novoequipamento_dataview.php';
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
                <p class="text-success">Consultar Equipamento</p>
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
            <h3 class="card-title">Consulte equipamentos por aqui.</h3>
          </div>
          <div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>

            </div>
          </div>
          <div class="card-body">
            <form id="form_pesq">
              <div class='row'>


                <div class="form-group col-md-6">

                  <label>Pesquisar por tipo </label>
                  <select name="filtro_tipo" id="filtro_tipo" class="form-control obg">
                    <option value="">Selecione</option>
                    <option value="<?= FILTRO_TIPO ?>">TIPO</option>
                    <option value="<?= FILTRO_MODELO ?>">MODELO</option>
                    <option value="<?= FILTRO_IDENTIFICACAO ?>">IDENTIFICACAO</option>
                    <option value="<?= FILTRO_DESCRICAO ?>">DESCRICAO</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label> Escolha o Filtro</label>
                  <input id="filtro_palavra" nome="filtro_palavra" class="form-control obg">
                </div>
                  <div class="form-group">

                    <button type="button" class="btn bg-gradient-primary" onclick="return FiltrarEquipamento('form_pesq')" name="btn_pesquisar">Pesquisar</button>
                    <button type="button" onclick=" return imprimir()" style="display: none" class="btn btn-danger" id="btn_relatorio">Imprimir</button>


                  </div>
              </div>
            </form>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <div class="card card-success" id="divResult" style="display:none">
                    <div class="card-header">
                      <h3 class="card-title">Equipamentos Cadastrado</h3>
                    </div>

                    <div class="panel-body">
                      <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-bordered table-hover" id="table_result">

                        </table>
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
  <script src="../../Resource/ajax/consultar-equipamento-ajx.js"></script>


</body>

</html>