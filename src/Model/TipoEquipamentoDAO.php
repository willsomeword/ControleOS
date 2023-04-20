<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\VO\TipoEQVO;
use Src\Model\SQL\TipoEquipamento;
use Src\VO\LogErro;

class TipoEquipamentoDAO extends Conexao
{
    

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }


    public function ConsultarTipoEquipamento(){
        $sql = $this->conexao->prepare(TipoEquipamento::SELECIONAR_TIPO());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function FiltrarSetorDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(TipoEquipamento::FILTRAR_TIPOEQUIPAMENTO());
        $sql->bindvalue(1, '%' .$nome_filtro.'%');
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function CadastrarTipoEquipamento(TipoEQVO $vo) : int
    {
        $sql  =  $this->conexao->prepare(TipoEquipamento::INSERIR_TIPO());
        $sql->bindValue(1,  $vo->getNome());
        try{
            
            $sql->execute();
            return 1;
        }catch(exception $ex) {

            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);

            return -1;
        }
    
    }
    public function AlterarTipoEquipamento (TipoEQVO $vo): int
    {
        $sql = $this->conexao->prepare(TipoEquipamento::ALTERAR_TIPO());
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getId());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex){

            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);

            return -1;
        }
    }

    public function ExcluirTipoDAO (TipoEQVO $vo): int
    {
        $sql = $this->conexao->prepare(TipoEquipamento::DELETE_TIPO());
        $sql->bindValue(1, $vo->getId());
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex){

            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);

            return -2;
        }
    }
        
}