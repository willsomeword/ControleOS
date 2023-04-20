<?php

namespace Src\VO;

use Src\Public\Util;
use Src\VO\UsuarioVO;


class FuncionarioVO extends UsuarioVO
{


    private $funcionario;
    private $setor;

    public function setFuncionario($funcionario){
        $this->funcionario = Util::TratarDados($funcionario);
    }
    public Function getFuncionario(){
       return $this->funcionario;
    }
    public function setsetor($f){
        $this->setor = Util::TratarDados($f);
    }
    public Function getsetor(){
       return $this->setor;
    }
}