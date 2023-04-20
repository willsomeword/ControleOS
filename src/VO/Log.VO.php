<?php


namespace Src\VO;

use Src\VO\UsuarioVO;

class LogVO extends UsuarioVO
{

    private $id_user;
    private $data_log;
    private $hora;
    private $ip;
    


    public function setId($id)
    {
        $this->id_user = $id;
    }
    public function getId()
    {
       $this->id_user;
    }
    
    public function setDataLog($DTL)
    {
        $this->data_log = $DTL;
    }
    public function getDataLog()
    {
        $this->data_log;
    }

    
    public function setHora($H)
    {
        $this->hora = $H;
    }
    public function getHora()
    {
        $this->hora;
    }

    public function setIp($P)
    {
        $this->ip = $P;
    }
    public function getIp()
    {
        $this->ip;
    }


}