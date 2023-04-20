<?php

namespace Src\VO;

use Src\Public\Util;


Class EstadoVO
{
   
    private $nomeestado;
    private $siglaestado;


    public function setnomeestado($estado){
    $this->nomeestado = Util::TratarDados($estado);
    }
    public function getnomeestado(){
        return $this -> nomeestado;
    }
    public function setsiglaestado($sigla){
        $this->siglaestado =Util::TratarDados($sigla);
    }
    public function getsiglaestado (){
        return $this->siglaestado;
    }
}
