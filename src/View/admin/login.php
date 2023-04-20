<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/acesso_dataview.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once PATH_URL . '/Template/_includes/_head.php';
    ?>
</head>


<!DOCTYPE html>
<html lang="en">
<?php


?>

<body class="hold-transition login-page">
    <div><a  href="../../index2.html" class="h2"><b>Controle De acesso </b></a></div>
  
  
    <div class="login-box">


        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h2"><b>Acesse seu perfil</b></a>
                
                
            </div>
            <div class="card-body">
                <p class="login-box-msg">Entre para iniciar sua sessão.</p>
                <form action="login.php" method="post" id="form_login">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control obg" id="login" name="login" placeholder="Email" value="<?= isset($_POST['login']) ? $_POST['login'] : ' ' ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control obg" id="senha" name="senha" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    lembrar
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                        <button name="btn_acessar" class="btn btn-primary btn-block" onclick="return NotificarCamposGenerico('form_login')">Acessar</button>



                        <p class="mb-1">
                            <a href="forgot-password.html">esqueci a senha</a>
                        </p>
                   
                    </div>
                </form>
            </div>

        </div>
        <?php
        include_once PATH_URL . '/Template/_includes/_scripts.php';
        include_once PATH_URL . '/Template/_includes/_msg.php';
        ?>
      