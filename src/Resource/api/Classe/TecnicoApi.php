<?php

namespace Src\Resource\api\Classe;

use Src\Controller\ChamadoCTRL;
use Src\Resource\api\Classe\ApiRequest;
use Src\Controller\UsuarioCTRL;
use Src\Controller\NovoEquipamentoCTRL;
use Src\Public\Util;
use Src\VO\UsuarioVO;
use Src\VO\ChamadoVO;
use Src\VO\TecnicoVO;


class TecnicoApi extends ApiRequest
{

    private $params;
    private $ctrl_chamado;
    private $ctrl;
    private $ctrl_user;

    public function __construct()
    {
        $this->ctrl_chamado = new ChamadoCTRL;
        $this->ctrl = new UsuarioCTRL;
        $this->ctrl_user = new UsuarioCTRL;
    }


    public function AddParameters($p)
    {
        $this->params = $p;
    }
    
    

    public function CheckEndPoint($endpoint)
    {
        return method_exists($this, $endpoint);
        //method_exist rerifica a classe e ve se aquele endpoint enviado pelo cliente existe naquela classe

    }

    public function DetalharMeusDados()

    
    {
        if(Util::AuthenticationTokenAccess()){
        if (empty($this->params['id_user']))
            return 0;

        return $this->ctrl_user->DetalharUsuarioCTRL($this->params['id_user']);
        }else

            return  NAO_AUTORIZADO;

    }

    public function AtenderChamadoAPI(){

        if(Util::AuthenticationTokenAccess()){
        $vo = new ChamadoVO;

        $vo->setidChamado($this->params['id_chamado']);
        $vo->settecnico_atendimento($this->params['id_tec']);

        return (new ChamadoCTRL)->AtenderChamadoCTRL($vo);
        }else

        return NAO_AUTORIZADO;
    }

    public function AbrirChamado()
    {
        if(Util::AuthenticationTokenAccess()){
        $vo = new ChamadoVO();


        $vo->setID($this->params['id_user']);
        $vo->setdescricao_problema($this->params['problema']);
        $vo->setIDAlocar($this->params['id_alocar']);

        return (new ChamadoCTRL)->AbriChamadoCTRL($vo);
        }else

        return NAO_AUTORIZADO;
    }

    public function AlterarTecnico()
    {
        if (Util::AuthenticationTokenAccess()) {

            $vo = new TecnicoVO;
            $vo->setNome($this->params['nome_usuario']);
            $vo->setNomeEmpresa($this->params['empresa']);
            $vo->setLogin($this->params['login']);
            $vo->setTelefone($this->params['telefone']);
            $vo->setCEP($this->params['cep']);
            $vo->setRua($this->params['rua']);
            $vo->setBairro($this->params['bairro']);
            $vo->setNomeCidade($this->params['cidade']);
            $vo->setSiglaEstado($this->params['sigla_est']);
            $vo->setId($this->params['id_user']);
            $vo->setidEndereco($this->params['id_endereco']);
            $vo->setTipo($this->params['tipo']);

            return (new UsuarioCTRL)->AlterarUsuarioCTRL($vo);
        } else
            return NAO_AUTORIZADO;
    }
    
    public function  FiltrarChamados()
    
    {  
        if(Util::AuthenticationTokenAccess()){                                         //se existir esse paramento vindo entao é ele senao é vazio.
        return $this->ctrl_chamado->FiltrarChamadosCTRL($this->params['situacao'], isset ($this->params['setor_id']) ? $this->params['setor_id']: '')
;        
        } else

        return NAO_AUTORIZADO; 
    }
    
    public function EncerrarChamado()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new ChamadoVO;

            $vo->settecnico_encerramento($this->params['tec_encerr']);
            $vo->setlaudo_tecnico($this->params['laudo_tec']);
            $vo->setIdChamado($this->params['id_chamado']);
            $vo->setIDAlocar($this->params['id_alocar']);
            return (new ChamadoCTRL)->EncerrarChamadoCTRL($vo);
        } else
            return NAO_AUTORIZADO;
    }

    public function Autenticar(){
        return $this->ctrl->ValidarAcessoFuncionarioAPI($this->params['login'], $this->params['senha'], PERFIL_TECNICO);
    }
    public function  VerificarSenhaAtual(){
        return $this->ctrl->ValidarSenhaAtual($this->params['id'], $this->params['senha']);
        
    }
    public function AtualizarSenha(){
        $vo = new UsuarioVO;

        $vo->setId($this->params['id']);
        $vo->setSenha($this->params['senha']);
        
        return $this->ctrl->AtualizarSenhaAtual($vo, $this->params['repetir_senha']);
        
    }



}

