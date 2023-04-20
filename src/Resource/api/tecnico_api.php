<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Resource\api\Classe\TecnicoApi;


$api = new TecnicoApi();


//Recupera o verbo http do cliente.
$api->SetMethod($_SERVER['REQUEST_METHOD']);

//verfica se é valido
if (!$api->CheckMethod($api->GetMethod()))
    $api->SendData("METHOD INVALID", -1, "ERROR");

//---------------RECUPERA A  INFORMACAÇÃO DO CLIENTE
$get_data = getallheaders();


$tem_json = str_contains($get_data['Content-Type'], 'application/json') ? true : false;


if ($tem_json) :
    $dados = file_get_contents('php://input');
    $dados = json_decode($dados, true);
else :
    $dados = $_POST;
endif;


//--------------------------------------
$api->SetEndPoint($dados['endpoint']);
//endpoint sao as funcoes que ele quer que chame . 

if (!$api->CheckEndPoint($api->GetEndPoint()))

    $api->SendData("Endpoint invalid", -1, "ERROR");

$api->AddParameters($dados);
//retorna aquele endpoint que foi solicitado . nessa funcao anonima.
$result = $api->{$api->GetEndPoint()}();

$api->SendData('Resultado', $result, '200');
