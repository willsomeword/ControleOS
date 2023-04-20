<?php

namespace Src\Controller;

use Src\Model\TipoEquipamentoDAO;
use Src\Public\Util;
use Src\VO\TipoEQVO;


class TipoEquipamentoCTRL
{


    private $dao;


    public function __construct()
    {
        $this->dao = new TipoEquipamentoDAO();
    }


    public function CadastrarTipoEquipamento(TipoEQVO $vo): int
    {
        if (empty($vo->getNome()))
            return 0;

        $vo->setFuncaoErro(CADASTRO_TIPO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarTipoEquipamento($vo);
    }


    public function AlterarTipoEquipamento(TipoEQVO $vo): int
    {
        if (empty($vo->getNome() || empty($vo->getId())))
            return 0;

        $vo->setFuncaoErro(ALTERAR_TIPO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarTipoEquipamento($vo);
    }

    
    public function ExcluirTipoEquipamento(TipoEQVO $vo): int
    {
        if (empty($vo->getId()))
            return 0;

        $vo->setFuncaoErro(EXCLUIR_TIPO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->ExcluirTipoDAO($vo);
    }



    public function ConsultarTipoEquipamentoCTRL() : array

    {
        return $this->dao->ConsultarTipoEquipamento();
    }
    
    public function FiltrarSetorCTRL($nome_filtro)
    {
        return $this->dao->FiltrarSetorDAO($nome_filtro);
    }
    

}
