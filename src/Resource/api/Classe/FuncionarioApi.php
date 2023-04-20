<?php

namespace Src\Resource\api\Classe;

use Src\Controller\ChamadoCTRL;
use Src\Resource\api\Classe\ApiRequest;
use Src\Controller\UsuarioCTRL;
use Src\Controller\NovoEquipamentoCTRL;
use Src\VO\UsuarioVO;
use Src\VO\ChamadoVO;
use Src\VO\FuncionarioVO;


class FuncionarioApi extends ApiRequest
{

    private $params;
    private $ctrl_chamado;
    private $ctrl;

    public function __construct()
    {
        $this->ctrl_chamado = new ChamadoCTRL;
        $this->ctrl = new UsuarioCTRL;
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
        if (empty($this->params['id_user']))
            return 0;

        return (new UsuarioCTRL)->DetalharUsuarioCTRL($this->params['id_user']);
    }

    public function AbrirChamado()
    {
        $vo = new ChamadoVO();


        $vo->setID($this->params['id_user']);
        $vo->setdescricao_problema($this->params['problema']);
        $vo->setIDAlocar($this->params['id_alocar']);

        return (new ChamadoCTRL)->AbriChamadoCTRL($vo);
    }

    public function AlterarMeusDados()
    {
        $vo = new FuncionarioVO;

        $vo->setId($this->params['id_user']);
        $vo->setNome($this->params['Nome']);
        $vo->setLogin($this->params['login']);
        $vo->setTelefone($this->params['telefone']);
        $vo->setidEndereco($this->params['id_end']);
        $vo->setrua($this->params['rua']);
        $vo->setbairro($this->params['bairro']);
        $vo->setcep($this->params['cep']);
        $vo->setsiglaestado($this->params['sigla']);
        $vo->setnomecidade($this->params['cidade']);
        $vo->setTipo(PERFIL_FUNCIONARIO);
        $vo->setSetor($this->params['id_setor']);


        return (new UsuarioCTRL)->AlterarUsuarioCTRL($vo);
    }

    public function SelecinarEquipamentosAlocados()
    {
        if (empty($this->params['setor_id']))
            return 0;

        return (new NovoEquipamentoCTRL)->SelecionarEquipamentosAlocadosSetorCTRL($this->params['setor_id']);
    }
    
    public function  FiltrarChamado(){                                           //se existir esse paramento vindo entao é ele senao é vazio.
        return $this->ctrl_chamado->FiltrarChamadosCTRL($this->params['situacao'], isset ($this->params['setor_id']) ? $this->params['setor_id']: '')
;        
    }
    public function  VerificarSenhaAtual(){
        return $this->ctrl->ValidarSenhaAtual($this->params['id'], $this->params['senha']);
        
    }
    public function AtualizarSenha(){
        $vo = new UsuarioVO;

        $vo->setId($this->params['id']);
        $vo->setSenha($this->params['senha']);
        
        return $this->ctrl->AtualizarSenhaAtualCTRL($vo, $this->params['repetir_senha']);
        
    }
    public function Autenticar(){
        return $this->ctrl->ValidarAcessoFuncionarioAPI($this->params['login'], $this->params['senha'],PERFIL_FUNCIONARIO);
    }


}

