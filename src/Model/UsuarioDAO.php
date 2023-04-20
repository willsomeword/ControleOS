<?php

namespace Src\Model;

use Exception;

use Src\Model\Conexao;
use Src\Model\SQL\EnderecoSQL;
use Src\Model\SQL\UsuarioSQL;
use Src\VO\FuncionarioVO;
use Src\Vo\LogErro;
use Src\VO\TecnicoVO;
use Src\VO\UsuarioVO;


class UsuarioDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    

    public function FiltrarPessoaDAO($nome,){
        $sql = $this->conexao->prepare(UsuarioSQL::FILTRAR_USUARIO($nome));

        if(!empty($nome))
        $sql->bindValue(1, '%' .$nome. '%');
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RecuperarSenhaAtual($id){
        $sql = $this->conexao->prepare(UsuarioSQL::RECUPERAR_SENHA_ATUAL());
        $sql->bindValue(1, $id);
        $sql->execute();
        return  $sql->fetch(\PDO::FETCH_ASSOC);
    }

    public function AtualizarSenhaAtual(UsuarioVO $vo){
        $sql = $this->conexao->prepare(UsuarioSQL::ATUALIZAR_SENHA());
        $i = 1;
        $sql->bindValue($i++, $vo->getSenha());
        $sql->bindValue($i++, $vo->getId());
        try {
            $sql->execute();
            return 1;

        } catch (Exception $ex){
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return  -1;
        }

    }

    public function VerificarEmailDuplicadoDAO($id, $mail){
        $sql = $this->conexao->prepare(UsuarioSQL::SELECIONAR_EMAIL($id));
        $i = 1;
        $sql->bindValue($i++, $mail);
        if (!empty($id))
            $sql->bindValue($i++, $id);
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC)['login'] == '' ? true : false;
    }

    public function CadastrarUsuarioDAO($vo)
    {

        $sql = $this->conexao->prepare(UsuarioSQL::INSERIR_USUARIO());
        $i = 1;
        $sql->bindValue($i++, $vo->getTipo());
        $sql->bindValue($i++, $vo->getNome());
        $sql->bindValue($i++, $vo->getLogin());
        $sql->bindValue($i++, $vo->getSenha());
        $sql->bindValue($i++, $vo->getStatus());
        $sql->bindValue($i++, $vo->getTelefone());

        $this->conexao->beginTransaction();

        try {
            $sql->execute();
            # Recupera o id recem cadastrado
            $id_user = $this->conexao->lastInsertId();

            $sql = $this->conexao->prepare(EnderecoSQL::SELECIONAR_CIDADE());
            $sql->bindValue(1, '%' . $vo->getnomecidade() . '%');
            $sql->execute();
            $tem_cidade = $sql->fetchAll(\PDO::FETCH_ASSOC);

            //verifica se encontrou a cidade 
            if (count($tem_cidade) == 0) {
                //Processo de cadastrar o estado e a cidade
                $sql = $this->conexao->prepare(EnderecoSQL::SELECIONAR_ESTADO());
                $sql->bindValue(1, '%' . $vo->getsiglaestado() . '%');
                $sql->execute();
                $tem_estado = $sql->fetchAll(\PDO::FETCH_ASSOC);
                //verifica se encontrou o estado
                if (count($tem_estado) == 0) {
                    $sql = $this->conexao->prepare(EnderecoSQL::INSERIR_ESTADO());
                    $i = 1;
                    $sql->bindValue($i++, $vo->getsiglaestado());
                    $sql->execute();
                    $id_estado = $this->conexao->lastInsertId();
                } else { // se nao encontrou, cadastra¹
                    $id_estado = $tem_estado[0]['id'];
                }
                //processo para cadastrar cidade
                $sql = $this->conexao->prepare(EnderecoSQL::INSERIR_CIDADE());
                $i = 1;
                $sql->bindValue($i++, $vo->getnomecidade());
                $sql->bindValue($i++, $id_estado());
                $sql->execute();
                $id_cidade = $this->conexao->lastInsertId();
            } else {

                $id_cidade = $tem_cidade[0]['id'];
            }


            $sql = $this->conexao->prepare(EnderecoSQL::INSERIR_ENDERECO());
            $i = 1;
            $sql->bindValue($i++, $vo->getrua());
            $sql->bindValue($i++, $vo->getbairro());
            $sql->bindValue($i++, $vo->getcep());
            $sql->bindValue($i++, $id_cidade);
            $sql->bindValue($i++, $id_user);
            $sql->execute();

            switch ($vo->getTipo()){

                case 2://funcionario
                    $sql = $this->conexao->prepare(UsuarioSQL::INSERIR_FUNCIONARIO());
                    $i = 1;
                    $sql->bindValue($i++, $id_user);
                    $sql->bindValue($i++, $vo->getsetor());
                    $sql->execute();
                    break;
                
                case 3;
                    $sql = $this->conexao->prepare(UsuarioSQL::INSERIR_TECNICO());
                    $i = 1;
                    $sql->bindValue($i++, $id_user);
                    $sql->bindValue($i++, $vo->getNomeEmpresa());
                    $sql->execute();
                    break;

             }

                $this->conexao->commit();
                return 1;

        } catch (Exception $ex) {
            $this->conexao->rollBack();
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function AlterarUsuarioDAO($vo)
    {

        $sql = $this->conexao->prepare(UsuarioSQL::ALTERAR_USUARIO());
        $i = 1;
        
        $sql->bindValue($i++, $vo->getNome());
        $sql->bindValue($i++, $vo->getLogin());
        $sql->bindValue($i++, $vo->getTelefone());
        $sql->bindValue($i++, $vo->getId());

        $this->conexao->beginTransaction();

        try {
            $sql->execute();
            # Recupera o id recem cadastrado
            

            $sql = $this->conexao->prepare(EnderecoSQL::SELECIONAR_CIDADE());
            $sql->bindValue(1, '%' . $vo->getnomecidade() . '%');
            $sql->execute();
            $tem_cidade = $sql->fetchAll(\PDO::FETCH_ASSOC);

            //verifica se encontrou a cidade 
            if (count($tem_cidade) == 0) {
                //Processo de cadastrar o estado e a cidade
                $sql = $this->conexao->prepare(EnderecoSQL::SELECIONAR_ESTADO());
                $sql->bindValue(1, '%' . $vo->getsiglaestado() . '%');
                $sql->execute();
                $tem_estado = $sql->fetchAll(\PDO::FETCH_ASSOC);
                //verifica se encontrou o estado
                if (count($tem_estado) == 0) {
                    $sql = $this->conexao->prepare(EnderecoSQL::INSERIR_ESTADO());
                    $i = 1;
                    $sql->bindValue($i++, $vo->getsiglaestado());
                    $sql->execute();
                    $id_estado = $this->conexao->lastInsertId();
                } else { // se nao encontrou, cadastra¹
                    $id_estado = $tem_estado[0]['id'];
                }
                //processo para cadastrar cidade
                $sql = $this->conexao->prepare(EnderecoSQL::INSERIR_CIDADE());
                $i = 1;
                $sql->bindValue($i++, $vo->getnomecidade());
                $sql->bindValue($i++, $id_estado());
                $sql->execute();
                $id_cidade = $this->conexao->lastInsertId();
            } else {

                $id_cidade = $tem_cidade[0]['id'];
            }


            $sql = $this->conexao->prepare(EnderecoSQL::ALTERAR_ENDERECO());
            $i = 1;
            $sql->bindValue($i++, $vo->getrua());
            $sql->bindValue($i++, $vo->getbairro());
            $sql->bindValue($i++, $vo->getcep());
            $sql->bindValue($i++, $id_cidade);
            $sql->bindValue($i++, $vo->getidendereco());
            $sql->execute();

            switch ($vo->getTipo()){

                case 2://funcionario
                    $sql = $this->conexao->prepare(UsuarioSQL::ALTERAR_FUNCIONARIO());
                    $i = 1;
                    $sql->bindValue($i++, $vo->getsetor());
                    $sql->bindValue($i++, $vo->getId());
                    $sql->execute();
                    break;
                
                case 3;
                    $sql = $this->conexao->prepare(UsuarioSQL::ALTERAR_TECNICO());
                    $i = 1;
                    $sql->bindValue($i++, $vo->getNomeEmpresa());
                    $sql->bindValue($i++, $vo->getId());
                    $sql->execute();
                    break;

             }

                $this->conexao->commit();
                return 1;

        } catch (Exception $ex) {
            $this->conexao->rollBack();
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function MudarStatusDAO(UsuarioVO $vo){

        $sql = $this->conexao->prepare(UsuarioSQL::MUDAR_STATUS());
        $sql->bindValue(1, $vo->getStatus());
        $sql->bindValue(2, $vo->getId());
        try {
            $sql->execute();
            return 1;

        } catch (Exception $ex){
            $vo->setMsgErro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -3;
        }

    }

    public function DetalharFuncionarioDAO($idUser){
        $sql = $this->conexao->prepare(UsuarioSQL::DETALHAR_USUARIO());
        $sql->bindValue(1, $idUser);

        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
        //fecth evita o index

    }

    public function ValidarLoginDAO($login, $status, $tipo)
    {
        $sql = $this->conexao->prepare(UsuarioSQL::BUSCAR_DADOS_ACESSO());
        $i =1;
        $sql->bindValue($i++, $login);
        $sql->bindValue($i++, $status);  
        $sql->bindValue($i++, $tipo);
        
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }

}
