<?php

namespace Src\VO;

use Src\Public\Util;


class SetorVO extends LogErro
{

    private $Setor;
    private $id;


    public function setNomeSetor($Setor){
        $this->Setor = Util::TratarDados($Setor);
    }
    public function getNomeSetor(){
        return $this->Setor;
    }

    public function setid($d){
        $this->id = Util::TratarDados($d);
    }
    public function getid(){
        return $this->id;
    }
}
