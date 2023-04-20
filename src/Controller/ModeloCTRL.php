<?php

namespace Src\Controller;

use Src\Model\ModeloDAO;
use Src\Public\Util;
use Src\VO\ModeloEquipamentoVO;

class ModeloCTRL
{
    private $dao;

    public function __construct()
    {
        $this->dao = new ModeloDAO();
    }
    public function CadastrarModeloCTRL(ModeloEquipamentoVO $vo): int
    {

        if (empty($vo->getnome()))
            return 0;
            $vo->setFuncaoErro(CADASTRO_MODELO_EQUIPAMENTO);
            $vo->setIdLogado (Util::CodigoLogado());

            return $this->dao->CadastrarModeloDAO($vo);
    }
    public function AlterarModeloCTRL(ModeloEquipamentoVO $vo): int
    {
        if(empty($vo->getnome() || empty($vo->getid())))
        return 0;
        $vo->setFuncaoErro(ALTERAR_MODELO_EQUIPAMENTO);
        $vo->setIdLogado (Util::CodigoLogado());
        return $this->dao->AlterarModeloDAO($vo);
    }

    public function ExcluirModeloCTRL(ModeloEquipamentoVO $vo): int
    {
        if(empty($vo->getid()))
        return 0;

        $vo->setFuncaoErro(EXCLUIR_MODELO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->ExcluirModeloDAO($vo);
    }


    public function ConsultarModelosCTRL(): array
    {
        return $this->dao->ConsultarModelosDAO();
    }
    
    public function FiltrarModeloCTRL($nome_filtro)
    {
        return $this->dao->FiltrarModeloDAO($nome_filtro);
    }
}
