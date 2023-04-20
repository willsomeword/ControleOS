<?php

namespace Src\Public;

class Util{

    public static function IniciarSessao(){
        if(!isset ($_SESSION))
        session_start();
    }
    #toda vez que precisar trabalhar com sessao, dar um self e chamar ela.  self chamar recurso dentro de uma classe estatica
    #se nao for estatica dis.

    public static function CriarSessao($id, $nome){
        self::IniciarSessao();
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;

    }
    public static function CodigoLogado(){

       self::IniciarSessao();
        return isset($_SESSION['id'])  ? $_SESSION['id'] : 0;
    }
    public static function NomeLogado(){
        
        self::IniciarSessao();
        return $_SESSION['nome'];

    }
    public static function Deslogar(){
        self::IniciarSessao();
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        self::IrParaLogin();

    }

    public static function IrParaLogin(){
        header('location:http://localhost/ControleOs13h/src/View/admin/login.php');
        exit;
    }

    public static function VerificarLogado(){
        self::IniciarSessao();
        if (!isset($_SESSION['id']))
        self::IrParaLogin();

    }


 //ASpas duplas faz leitura de variavel dentro de um string.
    public static function chamarPagina($pag){
        header("location: $pag");
        
        exit;

    }

    public static function TratarDados($palavra){

        return strip_tags(trim($palavra));


    }


    private static function SetarFusoHorario()
    {
        date_default_timezone_set('AMERICA/SAO_PAULO');

    }

    public static function MostrarArray($arr)
    {
        echo'<pre>';
        print_r($arr);
        echo'</prev>';
    }

    public static function ValidarSenhaBanco($senha, $senha_hash)
    {
        return password_verify($senha, $senha_hash);
    }


    public static function HoraAtual()
    {
        self::SetarFusoHorario();
        return date('H:i:s');

    }
    

    public static function DataHoraAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d H:i:s');

    }
    


    public static function  DataAtual()
    {
        self::SetarFusoHorario();
        return date('Y-m-d');

    }
    public static function CriarSenha($palavra){

        $senha_array = explode('@', $palavra);

      return password_hash($senha_array[0], PASSWORD_DEFAULT);
    }

    public static function remove_especial_char($string){
        $especiais= Array(".",",",";","!","@","#","%","¨","*","(",")","+","-","=", "§","$","|","\\",":","/","<",">","?","{","}","[","]","&","'",'"',"´","`","?",'“','”','$',"'","'", ' ');
        $string = str_replace($especiais,"",strip_tags(trim($string)));
        return $string;
      }

    public static function DescricaoTipo($tipo): string
    {
        $nome = '';
        switch ($tipo){
            case PERFIL_ADM:
                $nome = "ADMINISTRADOR";
                break;
            
            case PERFIL_TECNICO:
                $nome = "TECNICO";
                break;
            
            case PERFIL_FUNCIONARIO:
                $nome = "FUNCIONARIO";
                break;
        }
        return $nome;
    }

    
    public static function DescricaoStatus($status): string
    {
        $nome = '';
        switch ($status){
            case STATUS_ATIVO:
                $nome = "Ativo";
                break;
            
            case STATUS_INATIVO:
                $nome = "Inativo";
                break;
  
        }
        return $nome;
    }


    public static function CreateTokenAuthentication(array $dados_user)
    {
        $header = [
            'typ' => 'JWT',
            'alg' => 'H5256'
        ];

        $payload = $dados_user;
        $header = json_encode($header);
        $payload = json_encode($payload);
        $header = base64_encode($header);
        $payload = base64_encode($payload);
        $sign = hash_hmac(
            "sha256",
            $header . '.' . $payload,
            SECRET_JWT_FUNC,
            true
        );
        $sign = base64_encode($sign);
        $token = $header . '.' . $payload . '.' . $sign;
        return $token;
    }

    public static function AuthenticationTokenAccess()
    {
        //Recupera todo o cabecalho da requisição
        $http_header = apache_request_headers();
        //se n for nulo
        if(
            $http_header['Authorization'] != null 
           
        ):

            //quebra o bearer(autenticação de token)
            $bearer = explode(' ', $http_header['Authorization']);
            $token = explode('.', $bearer[1]);
            //faz a criptografia novamente para ver em seus significados
            $header = $token[0];
            $payload = $token[1];
            $sign = $token[2];
            //faz a criptografia novamente para ver se bate com a chave
            $valid = hash_hmac(
                'sha256',
                $header . '.' . $payload,
                SECRET_JWT_FUNC,
                true
            );
            $valid = base64_encode($valid);
            if ($valid === $sign)
                return true;
            else
                return false;
        endif;
        
        return false;

    }






}