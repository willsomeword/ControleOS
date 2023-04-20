<?php

namespace Src\VO;

use Src\Public\Util;
use Src\VO\UsuarioVO;

class TecnicoVO extends UsuarioVO
{


    private $NomeEmpresa;

    //* get e set do tipo
    public function setNomeEmpresa($empresa)
    {
        $this->NomeEmpresa = Util::TratarDados($empresa);
    }
    public function getNomeEmpresa()
    {
        return $this->NomeEmpresa;
    }
}