<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\Model\SQL\ChamadoSQL;
use Src\VO\ChamadoVO;

class ChamadoDAO extends Conexao{
    private $conexao;
    
    public function __construct()
    {
        $this->conexao = parent::retornaConexao();

    }

    public function AbrirChamadoDAO(ChamadoVO $vo){
        
        $sql = $this->conexao->prepare(ChamadoSQL::ABRIR_CHAMADO());
        $i = 1;
        $sql->bindValue($i++, $vo->getdata_abertura());
        $sql->bindValue($i++, $vo->getdescriçao_problema());
        $sql->bindValue($i++, $vo->getId());
        $sql->bindValue($i++, $vo->getIDAlocar());

        $this->conexao->beginTransaction();
        try{
            $sql->execute();
            $sql = $this->conexao->prepare(ChamadoSQL::ATUALIZAR_ALOCAMENTO());
            $i = 1;
            $sql->bindValue($i++, $vo->getsitucao());
            $sql->bindValue($i++, $vo->getIDAlocar());
            $sql->execute();
            $this->conexao->commit();
            return 1;  
            
        }   catch (Exception $ex) {
            $this->conexao->rollBack();
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
   

    }

    public function FiltrarChamadosDAO($tipo, $setor_id){
        $sql = $this->conexao->prepare(ChamadoSQL::FILTRAR_CHAMADO($tipo, $setor_id));
        if(!empty($setor_id))
            $sql->bindValue(1, $setor_id);
            
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function FiltrarDadosChamadosDAO(){
        $sql = $this->conexao->prepare(ChamadoSQL::DADOS_CHAMADOS());
   
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }

    public function AtenderChamadoDAO(ChamadoVO $vo)
    {
        $sql= $this->conexao->prepare(ChamadoSQL::ATENDER_CHAMADO());
        $i = 1;
        $sql->bindValue($i++, $vo->getdata_atendimento());
        $sql->bindValue($i++, $vo->gettecnico_atendimento());
        $sql->bindValue($i++, $vo->getidChamado());

        $sql->execute();
        try {
            $sql->execute();
            return 1;
        }catch (exception $ex){
            $this->conexao->rollBack();
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;

        }


    }

    public function EncerrarChamadoDAO(ChamadoVO $vo){

        $sql = $this->conexao->prepare(ChamadoSQL::ENCERRAR_CHAMADO());
        $i = 1;
        $sql->bindValue($i++, $vo->getdata_encerramento());
        $sql->bindValue($i++, $vo->gettecnico_encerramento());
        $sql->bindValue($i++, $vo->getlaudo_tecnico());
        $sql->bindValue($i++, $vo->getidChamado());

        $this->conexao->beginTransaction();

        try{
            $sql->execute();
            $sql = $this->conexao->prepare(ChamadoSQL::ATUALIZAR_ALOCAMENTO());
            $i = 1;
            $sql->bindValue($i++, $vo->getsitucao());
            $sql->bindValue($i++, $vo->getIDAlocar());
            $sql->execute();
            $this->conexao->commit();
            return 1;  
            
        }   catch (Exception $ex) {
            $this->conexao->rollBack();
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
}