<?php

namespace Src\VO; 

use Src\Public\Util;
use Src\VO\EnderecoVO;


class UsuarioVO extends EnderecoVO
{




        private $idUser;
        private $Tipo;
        private $Nome;
        private $Login;
        private $Senha;
        private $Status;
        private $Telefone;

    //*mecanismo de encapsulamento de codigo onde o get e o set encaminha as informaçoes no banco de dados.
    //*set e get do banco de dados. 
    //*
    public function setId($id)
    {
        $this->idUser = Util::TratarDados($id);
    }
    public function getId()
    {
        return $this->idUser;
    }

    public function setTipo($Tipo)
    {
        $this->Tipo = Util::TratarDados($Tipo);
    }
    public function getTipo()
    {
        return $this->Tipo;
    }

    public function setNome($Nome)
    {
        $this->Nome = Util::TratarDados($Nome);
    }
    public function getNome()
    {
        return $this->Nome;
    }

    public function setLogin($Lo)
    {
        $this->Login = Util::TratarDados($Lo);
    }
    public function getLogin()
    {
        return $this->Login;
    }
    
    public function setSenha($S)
    {
        $this->Senha = Util::TratarDados($S);
    }
    public function getSenha()
    {
        return $this->Senha;
    }

    public function setStatus($Status)
    {
        $this->Status = Util::TratarDados($Status);
    }
    public function getStatus()
    {
        return $this->Status;
    }

    public function setTelefone($Telefone)
    {
        $this->Telefone = Util::TratarDados($Telefone);
    }
    public function getTelefone()
    {
        return $this->Telefone;
    }
}




