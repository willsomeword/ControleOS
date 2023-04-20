<?php

namespace Src\VO;

use Src\Public\Util;
use Src\VO\LogErro;



class EnderecoVO extends LogErro
{
    private $idEndereco;
    private $rua;
    private $cep;
    private $bairro;
    private $idcidade;
    private $siglaestado;
    private $nomecidade;

    


    public function setidEndereco($idEndereco){
        $this->idEndereco = Util::TratarDados($idEndereco);
    }
    public function getidEndereco(){
        return $this->idEndereco;
    } 

    public function setrua($ru){
        $this->rua = Util::TratarDados($ru);
    }
    public function getrua(){
        return $this->rua;
    }
    public function setcep($ce){
        $this->cep = Util::remove_especial_char($ce);
    }
    public function getcep(){
        return $this->cep;
    }
    public function setbairro($b){
        $this->bairro = Util::TratarDados($b);
    }
    public function getbairro(){
        return $this->bairro;
    }
    public function setidcidade($p){
        $this->idcidade = Util::TratarDados($p);
    }
    public function getidcidade(){
        return $this->idcidade;
    }
    public function setnomecidade($c){
        $this->nomecidade = Util::TratarDados($c);
    }
    public function getnomecidade(){
        return $this->nomecidade;
    }
    public function setsiglaestado($s){
        $this->siglaestado = Util::TratarDados($s);
    }
    public function getsiglaestado(){
        return $this->siglaestado;
    }




}

