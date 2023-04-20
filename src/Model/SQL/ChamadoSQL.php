<?php


namespace Src\Model\SQL;

class ChamadoSQL
{
    //faltou o id alocar.
    public static function ABRIR_CHAMADO()
    {
        $sql = 'INSERT into tb_chamado(data_abertura, descriçao_problema, funcionario_id, alocar_id)
                            VALUES(?,?,?,?)';

        return $sql;
    }

    public static function ATUALIZAR_ALOCAMENTO()
    {
        $sql = 'UPDATE tb_alocar
                 set   situacao = ?
                 WHERE id = ?';

        return $sql;
    }

    public static function FILTRAR_CHAMADO($tipo, $setor_id)
    {
        $sql = 'SELECT ch.id,
                       ch.alocar_id, 
                       DATE_FORMAT(ch.data_abertura, "%d/%m/%Y às %Hh%i") as data_abertura,
                       DATE_FORMAT(ch.data_atendimento, "%d/%m/%Y às %Hh%i") as data_atendimento,
                       DATE_FORMAT(ch.data_encerramento, "%d/%m/%Y às %Hh%i") as data_encerramento,
                       ch.descriçao_problema,
                       ch.laudo_tecnico,
                       us_fu.nome as nome_funcionario,
                       us_tec_atendimento.nome as nome_tec_atendimento,
                       us_tec_encerramento.nome as nome_tec_encerramento,
                       eq.identificacao,
                       mo.nome,
                       ti.nomeequip
                  FROM tb_chamado as ch
            INNER JOIN tb_funcionario as fu
                    ON fu.funcionario_id = ch.funcionario_id
            INNER JOIN tb_usuario as us_fu
                    ON us_fu.id = fu.funcionario_id

            -- RELACIONAMENTO PARA PEGAR O TECNICO ATENDIMENTO --
             LEFT JOIN tb_tecnico as tec_atendimento
                    ON tec_atendimento.tecnico_id = ch.tecnico_atendimento
             LEFT JOIN tb_usuario as us_tec_atendimento
                    ON us_tec_atendimento.id = tec_atendimento.tecnico_id


            -- RELACIONAMENTO PARA PEGAR O TECNICO ENCERRAMENTO --
             LEFT JOIN tb_tecnico as tec_encerramento
                    ON tec_encerramento.tecnico_id = ch.tecnico_encerramento 
           
             LEFT JOIN tb_usuario as us_tec_encerramento
                    ON us_tec_encerramento.id = tec_encerramento.tecnico_id
             
            INNER JOIN tb_alocar as al
                    ON al.id = ch.alocar_id
            INNER JOIN tb_equipamento as eq
                    ON eq.id = al.equipamento_id
            INNER JOIN tb_modeloequip as mo
                    ON mo.id = eq.modeloequip_id
            INNER JOIN tb_tipoequip as ti
                    ON ti.id = eq.tipoequip_id';

        switch ($tipo) {
            case 1:
                $sql .= ' WHERE ch.data_atendimento is null';
                break;
            case 2:
                $sql .= ' WHERE ch.data_atendimento is not null
                      AND ch.data_encerramento is null';
                break;
            case 3:
                $sql .= ' WHERE ch.data_encerramento is not null';
                break;
        }
        if (!empty($setor_id))
            $sql .= ' AND al.setor_id = ?';
        return $sql;
    }

    public static function ATENDER_CHAMADO()
    {

        $sql = ' UPDATE tb_chamado
                  SET data_atendimento = ?,
                      tecnico_atendimento = ?
                WHERE id = ?';
        return $sql;
    }

    public static function ENCERRAR_CHAMADO(){

       $sql = 'UPDATE tb_chamado
                SET   data_encerramento =?,
                      tecnico_encerramento =?,
                      laudo_tecnico =?
                WHERE id =?' ;
            
        return $sql;
    }

    public static function DADOS_CHAMADOS()
    {

        $sql = 'SELECT
    (SELECT count(id) from tb_chamado WHERE data_atendimento IS NULL) AS qtd_aguardando,
    (SELECT count(id) from tb_chamado WHERE data_atendimento IS NOT NULL AND data_encerramento IS NULL) AS qtd_atendimento,
    (SELECT count(id) from tb_chamado WHERE data_encerramento IS NOT NULL) AS qtd_encerramento';

        return $sql;
    }
}
