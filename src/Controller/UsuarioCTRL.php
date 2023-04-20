<?php

namespace Src\Controller;

use Src\Model\UsuarioDAO;
use Src\Public\Util;
use Src\VO\UsuarioVO;

class UsuarioCTRL
{
    private $dao;


    public function __construct()
    {
        $this->dao = new UsuarioDAO();
    }



    public function VerificarEmailDuplicadoCTRL($mail, $id = ''): bool
    {
        return $this->dao->VerificarEmailDuplicadoDAO($id, $mail);
    }

    public function AlterarUsuarioCTRL($vo)
    {
        if (
            empty($vo->getNome())  || empty($vo->getTelefone())  || empty($vo->getrua())
            || empty($vo->getbairro())  || empty($vo->getcep())  || empty($vo->getnomecidade())
            || empty($vo->getsiglaestado()) || empty($vo->getLogin())
        )
            return 0;

        if ($vo->getTipo() == PERFIL_FUNCIONARIO) {
            if (empty($vo->getsetor()))
                return 0;
        } else if ($vo->getTipo() == PERFIL_TECNICO) {
            if (empty($vo->getNomeEmpresa()))
                return 0;
        }



        $vo->setFuncaoErro(ALTERAR_USUARIO);
        $vo->setIdLogado(Util::CodigoLogado() == 0 ? $vo->getId() :  Util::CodigoLogado());

        return $this->dao->AlterarUsuarioDAO($vo);
    }

    public function AtualizarSenhaAtualCTRL(UsuarioVO  $vo, $repetir_senha)
    {
        if (empty($vo->getSenha()) || empty($vo->getId()))
            return 0;

        if (strlen($vo->getsenha()) < 6)
            return -2;

        if ($vo->getsenha() != $repetir_senha)
            return -3;

        $vo->setSenha(Util::CriarSenha($vo->getSenha()));
        
        $vo->getDataerro(Util::DataAtual());
        $vo->getHoraErro(Util::DataHoraAtual());
        $vo->setIdLogado(Util::CodigoLogado() == 0 ? $vo->getId() : Util::CodigoLogado());
        $vo->setFuncaoErro(ATUALIZAR_SENHA);


        return $this->dao->AtualizarSenhaAtual($vo);
    }

    public function ValidarSenhaAtual($id, $senha)
    {

        if (Util::AuthenticationTokenAccess()) {
            if (empty($id) || empty($senha))
                return  0;

            $user_senha = $this->dao->RecuperarSenhaAtual($id);

            if (password_verify($senha,  $user_senha['senha']))
                return 1;

            else

                return  -1;
        } else
            return NAO_AUTORIZADO;
    }


    public function CadastrarUsuarioCTRL($vo)
    {
        if (
            empty($vo->getTipo())  || empty($vo->getNome())  || empty($vo->getTelefone())
            || empty($vo->getrua())  || empty($vo->getbairro())  || empty($vo->getcep())
            || empty($vo->getnomecidade())  || empty($vo->getsiglaestado()) || empty($vo->getLogin())
        )
            return 0;

        if ($vo->getTipo() == PERFIL_FUNCIONARIO) {
            if (empty($vo->getsetor()))
                return 0;
        } else if ($vo->getTipo() == PERFIL_TECNICO) {
            if (empty($vo->getNomeEmpresa()))
                return 0;
        }


        $vo->setStatus(STATUS_ATIVO);
        $vo->setSenha(Util::CriarSenha($vo->getLogin()));

        $vo->setFuncaoErro(CADASTRO_USUARIO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarUsuarioDAO($vo);
    }

    public function FiltrarPessoaCTRL($nome)
    {
        return $this->dao->FiltrarPessoaDAO($nome);
    }

    public function MudarStatusCTRL(UsuarioVO $vo)
    {


        $vo->setStatus($vo->getStatus() == STATUS_ATIVO ? STATUS_INATIVO : STATUS_ATIVO);
        $vo->setFuncaoErro(MUDAR_STATUS);
        $vo->setIdLogado(Util::CodigoLogado());


        return $this->dao->MudarStatusDAO($vo);
    }

    public function DetalharUsuarioCTRL($idUser)
    {
        return $this->dao->DetalharFuncionarioDAO($idUser);
    }

    public function ValidarLoginCTRL($login, $senha, $tipo)
    {
        if (empty($login) || empty($senha) || empty($tipo))
            return 0;

        $usuario = $this->dao->ValidarLoginDAO($login, STATUS_ATIVO, $tipo);
        # testa a variável para ver se encontrou o usuário com o login digitado
        if (empty($usuario))
            return -4;
        # testa a senha digitada, se bate com a criptografia do BD
        if (!Util::ValidarSenhaBanco($senha, $usuario['senha']))
            return -5;

        Util::CriarSessao($usuario['id'], $usuario['nome']);
        Util::ChamarPagina('inicial.php');
    }


    public function ValidarAcessoFuncionarioAPI($login, $senha, $tipo)
    {
        if (empty($login) || empty($senha))
            return 0;

        $user = $this->dao->ValidarLoginDAO($login, STATUS_ATIVO, $tipo);

        if (!empty($user)) {
            //esses sao as propriedades do objeto java script do endpoind que faz a validação com o tokin
            if (password_verify($senha, $user['senha'])) {
                //array
                $dados_usuario = [
                    'funcionario_id' => $user['id'],
                    'nome' => $user['nome'],
                    //'senha' => $user['senha'],
                    'setor_id' => $user['setor_id'],
                    'tipo' => $user['tipo']

                ];
                $token = Util::CreateTokenAuthentication($dados_usuario);

                return $token;
            } else
                return -3;
        } else
            return -3;
    }
}
