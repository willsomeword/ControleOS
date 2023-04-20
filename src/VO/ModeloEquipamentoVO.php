<?php

namespace Src\VO;

use Src\Public\Util;


class ModeloEquipamentoVO extends LogErro
{
    private $nome;
    private $id;


    public function setnome($modelo){
        $this->nome = Util::TratarDados($modelo);
    }
    public function getnome(){
        return $this->nome;
    }
    public function setid($d){
        $this->id = Util::TratarDados($d);
    }
    public function getid(){
        return $this->id;
    }
}



