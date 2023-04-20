<?php

namespace src\VO;

use src\Public\Util;

class TecnicoVO
{


    private $empresa_tecnico;

    //* get e set do tipo
    public function setNomeEmpresa($empresa)
    {
        $this->empresa_tecnico = Util::TratarDados($empresa);
    }
    public function getNomeEmpresa()
    {
        return $this->empresa_tecnico;
    }
}