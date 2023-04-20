<?php


namespace Src\VO;

use Src\Public\Util;

class LogErro
{

    private $IdLogado;
    private $hora;
    private $data;
    private $msg_erro;
    private $funcao;


    public function getDataErro()
    {
        $this->data = Util::DataAtual();

        return $this->data;
    }


    public function getHoraErro()
    {
        $this->hora = Util::HoraAtual();

        return $this->hora;
    }
    public function setIdLogado($id): void
    {
        $this->IdLogado = $id;
    }    
    public function getIdLogado(): int
    {
        return $this->IdLogado;
    }



    public function setMsgErro($p): void
    {
        $this->msg_erro = $p;
    }
    public function getMsgErro(): string
    {
        return $this->msg_erro;
    }

    
    public function setFuncaoErro($id): void
    {
        $this->funcao = $id;
    }
    public function getFuncaoErro(): string
    {
        return $this->funcao;
    }

  
}