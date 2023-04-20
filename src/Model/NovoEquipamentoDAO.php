<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\VO\EquipamentoVO;
use Src\Model\SQL\EquipamentoSQL;
use Src\VO\AlocarVO;
use PDO;


class NovoEquipamentoDAO extends Conexao
{
    private $conexao;
    
    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function FiltrarEquipamento($tipo_filtro, $nome_filtro){
        $sql = $this->conexao->prepare(EquipamentoSQL::FILTRAR_TIPO($tipo_filtro));
        $sql ->bindValue(1, '%' . $nome_filtro . '%');
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }
    
    public function SelecionarEquipamentosNaoAlocadosDAO($situacao){

        $sql = $this->conexao->prepare(EquipamentoSQL::SELECIONAR_EQUIPAMENTO_NAO_ALOCADOS());
        $sql->bindValue(1, $situacao);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC); 
     }

    public function DetalharEquipamentoDAO($id){
       $sql = $this->conexao->prepare(EquipamentoSQL::DETALHAR_EQUIPAMENTO($id));
       $sql->bindValue(1, $id);
       $sql->execute();
       return $sql->fetch(PDO::FETCH_ASSOC); 
    }



    public function NovoEquipamento(EquipamentoVO $vo) : int
    {
      
        $sql = $this->conexao->prepare(EquipamentoSQL::INSERIR_TIPO());
        $i = 1;
        $sql->bindValue($i++, $vo->getindetificacao());
        $sql->bindValue($i++, $vo->getdescricao());
        $sql->bindValue($i++, $vo->gettipoid());
        $sql->bindValue($i++, $vo->getmodeloid());
        try{

            $sql->execute();
            return 1;
        }catch(exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);

            return -1;
        }
    }

    public function AlocarEquipamentoDAO(AlocarVO $vo) {

        
        $sql = $this->conexao->prepare(EquipamentoSQL::ALOCAR_EQUIPAMENTO());
        $i=1;
        $sql->bindValue($i++, $vo->getsituacao());
        $sql->bindValue($i++, $vo->getdataalocacao());
        $sql->bindValue($i++, $vo->getidSetor());
        $sql->bindValue($i++, $vo->getequipamentoid());
        try{

            $sql->execute();
            return 1;
        }catch(exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);

            return -1;
        }

    }

    public function AlterarEquipamento(EquipamentoVO $vo) : int
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::ALTERAR_EQUIPAMENTO());
        $i = 1;
        $sql->bindValue($i++, $vo->getindetificacao());
        $sql->bindValue($i++, $vo->getdescricao());
        $sql->bindValue($i++, $vo->gettipoid());
        $sql->bindValue($i++, $vo->getmodeloid());
        $sql->bindValue($i++, $vo->getid());
        try{

            $sql->execute();
            return 1;
        }catch(exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);

            return -1;
        }




    }
    
    public function SelecionarEquipamentosAlocadosSetorDAO($situacao, $idSetor){

        $sql = $this->conexao->prepare(EquipamentoSQL::SELECIONAR_EQUIPAMENTO_SETOR());
        $sql->bindValue(1, $situacao);
        $sql->bindValue(2, $idSetor);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
        //fecth evita o index

    }

    public function RemoverEquipamentoSetorDAO(AlocarVO $vo) 
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::REMOVER_EQUIPAMENTO());
        $i = 1;
        $sql->bindValue($i++, $vo->getsituacao());
        $sql->bindValue($i++, $vo->getdataremocao());
        $sql->bindValue($i++, $vo->getid());
        try{

            $sql->execute();
            return 1;
        }catch(exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);

            return -1;
        }
        

        }



 
}