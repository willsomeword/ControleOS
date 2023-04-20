<?php

namespace Src\Model\SQL;



Class EquipamentoSQL
{
    public static function INSERIR_TIPO(){
        $sql = 'INSERT into tb_equipamento (identificacao, descricao, tipoequip_id, modeloequip_id) 
        VALUES (?,?,?,?)';
  
    return $sql;
    }

    public static function FILTRAR_TIPO($tipo_filtro)
    {

        $sql = 'SELECT tipo.nomeequip as nome_tipo,
                    modelo.nome as nome_modelo,
                    equip.identificacao,
                    equip.id,
                    equip.descricao
        FROM   tb_equipamento as equip
        INNER JOIN   tb_tipoequip as tipo
        ON   equip.tipoequip_id = tipo.id
        INNER JOIN   tb_modeloequip  as modelo
        ON   equip.modeloequip_id = modelo.id';



        switch ($tipo_filtro){

            case FILTRO_TIPO:
                $sql.= ' WHERE tipo.nomeequip LIKE ?';
                break;

            case FILTRO_DESCRICAO:
                $sql .= ' WHERE equip.descricao LIKE ?';
                break;

            case FILTRO_IDENTIFICACAO:
                $sql .= ' WHERE equip.identificacao LIKE ?';
                break;
            
            case FILTRO_MODELO:
                $sql .= ' WHERE modelo.nome LIKE ?';
                
                
        }

        return $sql;
    }

    public static function DETALHAR_EQUIPAMENTO(){
        $sql = 'SELECT id,
                        identificacao,
                        descricao,
                        tipoequip_id,
                        modeloequip_id
                    FROM tb_equipamento
                    WHERE id = ?';

                    return $sql;
    }

    

    public static function ALOCAR_EQUIPAMENTO(){
        $sql ='INSERT INTO tb_alocar
                           (situacao, data_alocacao, setor_id, equipamento_id)
                           VALUES (?,?,?,?)';
        return $sql;
    }

    public static function ALTERAR_EQUIPAMENTO(){
        $sql ='UPDATE tb_equipamento
                  SET identificacao = ?,
                      descricao = ?,
                      tipoequip_id = ?,
                      modeloequip_id = ?
                WHERE id = ?' ;

        return $sql;

    }

    public static function SELECIONAR_EQUIPAMENTO_NAO_ALOCADOS(){
        $sql = 'SELECT  mo.nome as nome_tipo,
                        mo.nome as nome_modelo,
                        eq.identificacao,
                        eq.id
                   FROM tb_equipamento as eq
             INNER JOIN tb_tipoequip as ti
                     ON eq.tipoequip_id = ti.id
             INNER JOIN tb_modeloequip as mo
                     ON eq.modeloequip_id = mo.id
                  WHERE eq.id NOT IN (SELECT equipamento_id
                                        FROM tb_alocar
                                       WHERE situacao != ?)';

        return $sql;
    }
    public static function SELECIONAR_EQUIPAMENTO_SETOR(){
        $sql = 'SELECT  ti.nomeequip as nome_tipo,
                        mo.nome as nome_modelo,
                        eq.identificacao,
                        al.id
                 FROM   tb_alocar as al
            INNER JOIN  tb_equipamento as eq
                    ON  al.equipamento_id = eq.id
             INNER JOIN tb_tipoequip as ti
                     ON eq.tipoequip_id = ti.id
             INNER JOIN tb_modeloequip as mo
                     ON eq.modeloequip_id = mo.id
                  WHERE al.situacao = ?
                    AND al.setor_id = ? ORDER BY nome_modelo';

        return $sql;
    }

    public static function REMOVER_EQUIPAMENTO(){
        $sql = 'UPDATE tb_alocar
                  SET situacao = ?,
                      data_remocao = ?
                    
                WHERE id = ?' ;

        return $sql;

    }
}
