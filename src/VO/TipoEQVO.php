<?php

namespace Src\VO;

use Src\Public\Util;
use Src\VO\LogErro;

class TipoEQVO extends LogErro
{

    private $nome;
    private $id;


    public function setNome($p)
    {
        $this->nome = Util::TratarDados($p);
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setId($Id)
    {
        $this->id = Util::TratarDados($Id);
    }
    public function getId()
    {
        return $this->id;
    }
}
