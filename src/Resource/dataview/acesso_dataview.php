<?php 

include_once '_include_autoload.php';


use Src\Controller\UsuarioCTRL;
use Src\Public\Util;




if (isset($_POST['btn_acessar'])) :
    $ret = (new UsuarioCTRL)->ValidarLoginCTRL($_POST['login'], $_POST['senha'], PERFIL_ADM);
endif;