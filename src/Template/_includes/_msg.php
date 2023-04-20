<?php
if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}


if (isset($ret)) {

    switch ($ret):

        case -5:

            echo ' <script>
            MensagemSenhaInvalida();
                   </script>';
            break;
        case -4:

            echo ' <script>
            MensagemLoginInvalido();
                       </script>';
            break;
        case -3:

            echo ' <script>
            MensagemRegistroNaoEncontrado();
                           </script>';
            break;

        case -2:

            echo ' <script>
                     MensagemExcluirUso();
                           </script>';
            break;

        case -1:

            echo ' <script>
                     MensagemErro();
                   </script>';
            break;

        case 0:

            echo ' <script>
                     MensagemCamposObrigatorios();
                   </script>';

            break;

        case 1:

            echo ' <script>
                     MensagemSucesso();
                   </script>';
            break;

    endswitch;
}
