<?php

namespace Src\Controller;

use Src\Model\NovoEquipamentoDAO;
use Src\Public\Util;
use Src\VO\EquipamentoVO;
use Src\VO\AlocarVO;



class NovoEquipamentoCTRL
{
    private $dao;

    public function __construct()
    {
        $this->dao = new NovoEquipamentoDAO();
    }

    public function DetalharEquipamentoCTRL($id)
    {
        if (empty($id))
        return 0;

        return $this->dao->DetalharEquipamentoDAO($id);
    }

    public function FiltrarEquipamentoCTRL($tipo_filtro, $nome_filtro)
    {
        if(empty(trim($nome_filtro)))
         return 0 ;
        return $this->dao->FiltrarEquipamento($tipo_filtro, $nome_filtro);
    }


    public function NovoEquipamentoCTRL(EquipamentoVO $vo)
    {
       
           if (
               empty($vo->getindetificacao()) || empty($vo->getdescricao()) 
               || empty($vo->getmodeloid()) || empty($vo->gettipoid())
               )
           
        return 0 ;

        $vo->setFuncaoErro(CADASTRO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->NovoEquipamento($vo);
        
    }

    public function AlterarEquipamentoCTRL(EquipamentoVO $vo)
    {
       
           if (
               empty($vo->getindetificacao()) || empty($vo->getdescricao()) 
               || empty($vo->getmodeloid()) || empty($vo->gettipoid()) 
               || empty($vo->getid())
               )
           
        return 0 ;

        $vo->setFuncaoErro(ALTERAR_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarEquipamento($vo);
        
    }

    public function AlocarEquipamentoCTRL(AlocarVO $vo)
    {
        if(empty($vo->getequipamentoid()) || empty($vo->getidSetor()))
        return 0;

        $vo->setdataalocacao(Util::DataAtual());
        $vo->setsituacao(SITUACAO_ALOCADO);
        $vo->setFuncaoErro(ALOCAR_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());
        
        return $this->dao->AlocarEquipamentoDAO($vo);
    }

    public function SelecionarEquipamentosNaoAlocadosCTRL(){
        
        $list = $this->dao->SelecionarEquipamentosNaoAlocadosDAO(SITUACAO_REMOVIDO);

        for ( $i = 0 ; $i < count($list); $i++) {

            $list[$i]['nome_modelo'] = $list[$i]['nome_modelo'] . ' / ' . $list[$i]['nome_tipo'] . ' / ' . $list[$i]['identificacao'];
        }
            return $list;
        
    }

    public function SelecionarEquipamentosAlocadosSetorCTRL($idSetor) : array
    {
        return $this->dao->SelecionarEquipamentosAlocadosSetorDAO(SITUACAO_ALOCADO, $idSetor);

    }   

    public function RemoverEquipamentoSetorCTRL(AlocarVO $vo) : int
    {
        $vo->setsituacao(SITUACAO_REMOVIDO);
        $vo->setdataremocao(Util::DataAtual());

        $vo->setFuncaoErro(REMOVER_EQUIPAMENTO_SETOR);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RemoverEquipamentoSetorDAO($vo);
    }
}