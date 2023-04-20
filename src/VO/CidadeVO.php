<?php

namespace Src\VO;

use src\Public\Util;

class CidadeVO extends EstadoVO

{


    private $NomeCidade;

    //* get e set do tipo
    public function setNomeCidade($cidade)
    {
        $this->NomeCidade = Util::TratarDados($cidade);
    }
    public function getNomeEmpresa()
    {
        return $this->NomeCidade;
    }
}