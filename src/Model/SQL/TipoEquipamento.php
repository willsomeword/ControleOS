<?php

namespace Src\Model\SQL;


class TipoEquipamento{

    public static function INSERIR_TIPO()
    {
        $sql = 'INSERT into tb_tipoequip (nomeequip) VALUES (?)';
        return $sql;
    }

    public static function  ALTERAR_TIPO()
    {
        $sql = 'UPDATE tb_tipoequip
                   SET nomeequip = ?
                   WHERE id = ?';
                   
        return $sql;
    }
    public static function DELETE_TIPO()
    {
        $sql = 'DELETE from tb_tipoequip
                  WHERE id = ?';


        return $sql;
    }
   
    public static function FILTRAR_TIPOEQUIPAMENTO()
    {
        $sql = 'SELECT id, nomeequip FROM tb_tipoequip WHERE nome LIKE ? ';

        return $sql;
    }

    public static function  SELECIONAR_TIPO(){
        $sql = 'SELECT id, 
                       nomeequip
                  FROM tb_tipoequip
                  ORDER BY nomeequip ASC';

        return $sql ;
    }




} 