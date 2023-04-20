<?php

namespace Src\Controller;

use Src\Model\SetorDAO;
use Src\Public\Util;
use Src\VO\SetorVO;



class SetorCTRL
{


    private $dao;


    public function __construct()
    {
        $this->dao = new SetorDAO();
    }


    public function CadastrarSetor(SetorVO $vo): int
    {
        if (empty($vo->getNomeSetor()))
            return 0;

        $vo->setFuncaoErro(CADASTRO_TIPO_SETOR);
        $vo->setIdLogado (Util::CodigoLogado());


        return $this->dao->CadastrarTipoSetor($vo);

    }
    
    public function AlterarTipoSetor(SetorVO $vo): int
    {
        if(empty($vo->getNomeSetor() || empty($vo->getid())));
        return 0;

        $vo->setFuncaoErro(ALTERAR_TIPO_SETOR);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarTipoSetor($vo);
    }


    public function ExcluirTipoSetor(SetorVO $vo): int
    {
        if (empty($vo->getid()))
        return 0;

        $vo->setFuncaoErro(EXCLUIR_TIPO_SETOR);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->ExcluirTipo($vo);
    }

    public function ConsultarTipoSetor() : array
    {
        return $this->dao->ConsultarSetor();
    }

    public function FiltrarTipoCTRL($nome)
    {
        return $this->dao->FiltrarTipoDAO($nome);
    }

 
}
