<?php
namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\Model\SQL\Modelo;
use Src\Model\SQL\ModeloSQL;
use Src\VO\ModeloEquipamentoVO;

class ModeloDAO extends Conexao
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function ConsultarModelosDAO()
    {
        $sql = $this->conexao->prepare(ModeloSQL::SELECIONAR_MODELO());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);

    }
    public function FiltrarModeloDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(ModeloSQL::FILTRAR_MODELO($nome_filtro));
        if (!empty($nome_filtro))
        $sql->bindValue(1, '%' .  $nome_filtro . '%');
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);

    }


    public function CadastrarModeloDAO(ModeloEquipamentoVO $vo) 
    {
        $sql = $this->conexao->prepare(ModeloSQL::INSERIR_MODELO());
        $sql->bindValue(1,$vo->getnome());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function AlterarModeloDAO(ModeloEquipamentoVO $vo): int
    {
        $sql = $this->conexao->prepare(ModeloSQL::ALTERAR_MODELO());
        $sql->bindValue(1, $vo->getnome());
        $sql->bindValue(2, $vo->getid());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function ExcluirModeloDAO(ModeloEquipamentoVO $vo): int
    {
        $sql = $this->conexao->prepare(ModeloSQL::DELETAR_MODELO());
        $sql->bindValue(1, $vo->getid());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    
}

    