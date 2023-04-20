<?php

namespace Src\VO;

use Src\Public\Util;


class ChamadoVO extends TecnicoVO
{


    private $data_abertura;
    private $descricao_problema;
    private $data_atendimento;
    private $data_encerramento;
    private $laudo_tecnico;
    private $funcionario;
    private $tecnico_atendimento;
    private $tecnico_encerramento;
    private $alocar;
    private $situacao;
    private $idChamado;



    public function setidChamado($idChamado){
        $this->idChamado = Util::TratarDados($idChamado);
    }
    public function getidChamado(){
        return $this->idChamado;
    }
    public function setdata_abertura($abertura){
        $this->data_abertura = Util::TratarDados($abertura);
    }
    public function getdata_abertura(){
        return $this->data_abertura;
    }
    public function setdescricao_problema($problema){
        $this->descricao_problema = Util::TratarDados($problema);
    }
    public function getdescriçao_problema(){
        return $this->descricao_problema;
    }
    public function setdata_atendimento($atendimento){
        $this->data_atendimento = Util::TratarDados($atendimento);
    }
    public function getdata_atendimento(){
        return $this->data_atendimento;
    }
    public function setdata_encerramento($encerramento){
        $this->data_encerramento = Util::TratarDados($encerramento);
    }
    public function getdata_encerramento(){
        return $this->data_encerramento;
    }
    public function setlaudo_tecnico($laudo){
        $this->laudo_tecnico = Util::TratarDados($laudo);
    }
    public function getlaudo_tecnico(){
        return $this->laudo_tecnico;
    }
    public function setfuncionario($funcionario){
        $this->funcionario = Util::TratarDados($funcionario);
    }
    public function getfuncionario(){
        return $this->funcionario;
    }
    public function  settecnico_atendimento($atendimento){
        $this->tecnico_atendimento = Util::TratarDados($atendimento);
    }
    public function gettecnico_atendimento(){
        return $this->tecnico_atendimento;
    }
    public function settecnico_encerramento($encerramento){
        $this->tecnico_encerramento = Util::TratarDados($encerramento);
    }
    public function gettecnico_encerramento(){
        return $this->tecnico_encerramento;
    }
    public function setIDAlocar($d){
        $this->alocar= $d;
    }
    public function getIDAlocar(){
        return $this->alocar;
    }
    public function setsituacao($s){
        $this->situacao= $s;
    }
    public function getsitucao(){
        return $this->situacao;
    }
    
}