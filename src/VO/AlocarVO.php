<?php

namespace Src\VO;

use Src\Public\Util;


class AlocarVO extends LogErro
{
    private $situacao;
    private $dataalocacao;
    private $dataremocao;
    private $equipamento;
    private $setorequip;
    private $equipamentoid;
    private $idSetor;
    private $id;



    public function setsituacao($si){
        $this->situacao = Util::TratarDados($si);
    }
    public function getsituacao(){
        return $this->situacao;
    }
    public function setdataalocacao($data){
        $this->dataalocacao = Util::TratarDados($data);
    }
    public function getdataalocacao(){
        return $this->dataalocacao;
    }
    public function setdataremocao($remocao){
        $this->dataremocao = Util::TratarDados($remocao);
    }
    public function getdataremocao(){
        return $this->dataremocao;
    }
    public function setequipamento($equipamento){
        $this->equipamento = Util::TratarDados($equipamento);
    }
    public function getequipamento(){
        return $this->equipamento;
    }
    public function setsetorequip($setorequip){
        $this->setorequip = Util::TratarDados($setorequip);
    }
    public function getsetorequip(){
        return $this->setorequip;
    }
    public function setequipamentoid($d){
        $this->equipamentoid = $d;
    }
    public function getequipamentoid(){
        return $this->equipamentoid;
    }
    public function setidSetor($d){
        $this->idSetor = $d;
    }
    public function getidSetor(){
        return $this->idSetor;
    }
    public function setid($d){
        $this->id = $d;
    }
    public function getid(){
        return $this->id;
    }

}