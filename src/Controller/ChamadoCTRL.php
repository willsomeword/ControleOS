<?php

namespace Src\Controller;

use Src\Model\ChamadoDAO;
use Src\Public\Util;
use Src\VO\ChamadoVO;

class ChamadoCTRL
{
    private $dao;

    public function __construct()
    {
        $this->dao = new ChamadoDAO();
    }
    public function AbriChamadoCTRL(ChamadoVO $vo)
    {
            if(empty($vo->getdescriçao_problema()) || empty($vo->getIDAlocar()))
            return 0;

            $vo->setdata_abertura(Util::DataHoraAtual());
            $vo->setsituacao(SITUACAO_MANUTECAO);
            $vo->setFuncaoErro(ABRIR_CHAMADO);
            $vo->setIdLogado ($vo->getID());

            return $this->dao->AbrirChamadoDAO($vo);
    }

    public function FiltrarChamadosCTRL($tipo, $setor_id)
    {
        if (empty($tipo))
        return 0;

        return $this->dao->FiltrarChamadosDAO($tipo, $setor_id);
    }
    public function FiltrarDadosChamadosCTRL()
    {
       
        return $this->dao->FiltrarDadosChamadosDAO();
    }


    public function AbrirChamadoCTRL(ChamadoVO $vo)
    {
      if (empty($vo->getdescriçao_problema()) or empty($vo->getIDalocar()))
        return 0;

        $vo->setdata_abertura(Util::DataHoraAtual());
        $vo->setsituacao(SITUACAO_MANUTECAO);
        $vo->setFuncaoErro(ABRIR_CHAMADO);
        $vo->setIdLogado ($vo->getID());

        return $this->dao-> AbrirChamadoDAO($vo);
    }

    public function AtenderChamadoCTRL(ChamadoVO $vo)
    {
        if(empty($vo->getidChamado()) || empty($vo->gettecnico_atendimento()))
        return 0 ;

        $vo->setFuncaoErro(ATENDER_CHAMADO);
        $vo->setdata_atendimento(Util::DataHoraAtual());
        return $this->dao->AtenderChamadoDAO($vo);

    }

    public function EncerrarChamadoCTRL(ChamadoVO $vo)
    {
        if(empty($vo->gettecnico_encerramento()) || empty($vo->getlaudo_tecnico()) || empty($vo->getidChamado()) || empty($vo->getIDAlocar()))

        return 0 ;
        
        $vo->setdata_encerramento(Util::DataHoraAtual());
        $vo->setSituacao(SITUACAO_ALOCADO);

        return $this->dao->EncerrarChamadoDAO($vo);
    }


}
