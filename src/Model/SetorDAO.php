<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\VO\SetorVO;
use Src\Model\SQL\SetorSQL;
use Src\Vo\LogErro;



class SetorDAO extends Conexao
{
    

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function ConsultarSetor()
    {
        $sql = $this->conexao->prepare(SetorSQL::SELECIONAR_TIPO());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
       
    }

    public function FiltrarTipoDAO($nome)
    {
        $sql = $this->conexao->prepare(SetorSQL::FILTRAR_TIPO());
        $sql->bindValue(1, '%' .$nome. '%');
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }



    public function CadastrarTipoSetor(SetorVO $vo) : int
    {
        $sql  =  $this->conexao->prepare(SetorSQL::INSERIR_TIPO());
        $sql->bindValue(1,  $vo->getNomeSetor());
        try{
            
            $sql->execute();
            return 1;
        }catch(exception $ex) {
            return -1;
        }
    
    }

    public function AlterarTipoSetor(SetorVO $vo): int
    {
        $sql = $this->conexao->prepare(SetorSQL::ALTERAR_TIPO());
        $sql->bindvalue(1, $vo->getNomeSetor());
        $sql->bindvalue(2, $vo->getid());
        try {
            $sql->execute();
            return 1;
        } catch (exception $ex){

            return-1;
        }

        
    }
    
    public function ExcluirTipo (SetorVO $vo): int
    {
        $sql = $this->conexao->prepare(setorSQL::DELETE_TIPO());
        $sql->bindValue(1, $vo->getid());

        try {
            $sql->execute();
            return 1;
        } catch(Exception $ex){

            return-2;
        }
    }

    
        
}

