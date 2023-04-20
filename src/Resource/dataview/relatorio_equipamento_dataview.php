<?php
include_once '_include_autoload.php';

use Src\Public\Util;

Util::VerificarLogado();

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Src\Controller\NovoEquipamentoCTRL;


if (isset($_GET['filtro']) && isset($_GET['desc_filtro'])) {

    

        $tipo_filtro = $_GET['filtro'];
        $nome_filtro = $_GET['desc_filtro'];
        $ctrl = new NovoEquipamentoCTRL();
      
        $equips = $ctrl->FiltrarEquipamentoCTRL($tipo_filtro, $nome_filtro);

    $table_begin = '<h1><center>Equipamentos cadastrados</center></h1><hr>';

    $table_begin .= '

    <table class="table table-hover" width="100%">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nome do Modelo</th>
                    <th>Identificação</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>';
    $row = '';

    foreach ($equips as $e) :
        $row .= '<tr>
                        
                        <td>' . $e['nome_tipo'] . '</td>
                        <td>' . $e['nome_modelo'] . '</td>
                        <td>' . $e['identificacao'] . '</td>
                        <td>' . $e['descricao'] . '</td>
                    </tr>';
    endforeach;
    $table_end = '</tbody></table>';

    $table_complete = $table_begin . $row . $table_end;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml($table_complete);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
} else {
    Util::ChamarPagina('consultarequipamento');
}
