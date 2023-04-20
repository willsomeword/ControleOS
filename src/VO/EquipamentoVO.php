<?php

namespace Src\VO;

use Src\Public\Util;
use Src\VO\LogErro;


class EquipamentoVO extends LogErro{
    private $id;
    private $identificacao;
    private $descricao;
    private $modeloid;
    private $tipoid;



    public function setidentificacao($identificacao){
        $this->identificacao = Util::TratarDados($identificacao);
    }
    public function getindetificacao(){
        return $this->identificacao;
    }
    public function setdescricao($descricao){
        $this->descricao = Util::TratarDados($descricao);
    }
    public function getdescricao(){
        return $this->descricao;
    }
    public function setmodeloid($d){
        $this->modeloid = $d;
    }
    public function getmodeloid(){
        return $this->modeloid;
    }
    public function settipoid($i){
        $this->tipoid = $i;
    }
    public function gettipoid(){
        return $this->tipoid;
    }
    public function setid($p){
        $this->id = $p;
    }
    public function getid(){
        return $this->id;
    }
}


