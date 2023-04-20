<?php

namespace Src\Model\SQL;



Class Consultar
{

    
    public static function FILTRAR_EQUIPAMENTO($tipo_filtro)
    {
        $sql = 'SELECT tipo.nome as nom_tipo,
                        modelo.nome as nome_modelo,
                        equip.identificação,
                        equip.descricação
                    FROM tb_equipamento as equip
                    INNER join tb_tipoequi_id as tipo
                    on equip.tipoequip_id = tipo.id
                    INNER join tb_modeloequip as modelo
                    on equip.modeloequip_id = modelo.id';
            switch ($tipo_filtro){
                case FILTRO_TIPO:
                        $sql.= ' WHERE nome_tipo LIKE ?';
                        break;
                case FILTRO_DESCRICAO:
                        $sql.= ' WHERE equip.descricao LIKE ?';
                        break;
                case FILTRO_IDENTIFICACAO:
                        $sql.= ' WHERE equip.identificacao LIKE ?';
                        break;
                case FILTRO_MODELO:
                        $sql.= ' WHERE nome_modelo LIKE ?';
                        break;
             
            }
            return $sql;
    }


 

}
