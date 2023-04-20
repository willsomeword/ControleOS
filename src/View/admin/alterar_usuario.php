<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';

use Src\Public\Util;

Util::VerificarLogado();
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
                            <h1>Alterar Usuário</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Alteração do Usuário</a></li>
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
                        <h3 class="card-title">Aqui você poderá alterar o usuário</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="alterar_usuario.php" id="form_cad">
                            <input type="hidden" name="tipo" id="tipo" value="<?= $user['tipo'] ?>">
                            <input type="hidden" name="id" id="id" value="<?= $user['id_user'] ?>">
                            <input type="hidden" name="idendereco" id="idendereco" value="<?= $user['id_end'] ?>">

                            <?php if ($user['tipo'] == PERFIL_FUNCIONARIO) { ?>
                                <div class="form-group" id="divFunc">
                                    <label>Setor</label>
                                    <select id="setor" name="setor" class="form-control">
                                        <?php foreach ($setores as $s) { ?>
                                            <option value="<?= $s['id'] ?>" <?= $s['id'] == $user['setor_id'] ? 'selected' : '' ?>><?= $s['nome_setor'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                            <?php if ($user['tipo'] == PERFIL_TECNICO) { ?>
                                <div id="divTecnico">
                                    <div class="form-group">
                                        <label>Nome da Empresa do Técnico</label>
                                        <input id="nomeempresa" name="nomeempresa" class="form-control" placeholder="Nome da Empresa" id="nome_empresa_tec" name="nome_empresa_tec" value="<?= $user['empresa_tecnico']  ?>">
                                    </div>
                                </div>
                            <?php } ?>
                            <div id="divGeral">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input id="nome" name="nome" class="form-control obg" placeholder="Nome" id="nome" name="nome" value="<?= $user['nome']  ?>">
                                </div>

                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input id="email" onchange="VerificarEmail(this.value)" name="email" class="form-control obg" placeholder="E-mail" id="email" name="email" value="<?= $user['login']  ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input id="telefone" name="telefone" class="form-control obg num cel" placeholder="Telefone" value="<?= $user['telefone']  ?>">
                                </div>
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input id="cep" name="cep" class="form-control obg cep num" placeholder="CEP" onblur="BuscarCep()" value="<?= $user['cep']  ?>">
                                </div>
                                <div class="form-group">
                                    <label>Rua</label>
                                    <input id="rua" name="rua" class="form-control obg" placeholder="Rua" value="<?= $user['rua']  ?>">
                                </div>
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input id="bairro" name="bairro" class="form-control obg" placeholder="Bairro" value="<?= $user['bairro']  ?>">
                                </div>
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input id="cidade" name="cidade" readonly class="form-control obg" placeholder="Cidade" value="<?= $user['cidade']  ?>">
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input id="uf" name="uf" readonly class="form-control obg" placeholder="Estado" value="<?= $user['sigla_estado']  ?>">
                                </div>
                            </div>
                            <div class="form-group" id="divButton">
                                <button onclick=" return NotificarCamposGenerico('form_cad')" class="btn btn-success" name="btn_alterar">Gravar</button>
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
    <script src="../../Resource/ajax/buscar_cep-ajx.js"></script>
    <script src="../../Resource/ajax/usuario-ajx.js"></script>

</body>

</html>
<script src="../../Resource/ajax/usuario-ajx.js"></script>