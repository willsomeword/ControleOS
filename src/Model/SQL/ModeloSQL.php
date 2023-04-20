<?php

namespace Src\Model\SQL;

class ModeloSQL
{

    public static function INSERIR_MODELO()
    {
        $sql = 'INSERT into tb_modeloequip (nome) VALUES (?)';
        return $sql;
    }

    public static function ALTERAR_MODELO()
    {
        $sql = 'UPDATE tb_modeloequip
                   SET nome = ?
                 WHERE id = ?';
        return $sql;
    }

    public static function DELETAR_MODELO()
    {
        $sql = 'DELETE from tb_modeloequip
                          WHERE id = ?';
        return $sql;
    }

    public static function SELECIONAR_MODELO()
    {
        $sql = 'SELECT id,
                       nome
                  FROM tb_modeloequip
              ORDER BY nome';

        return $sql;
    }

    public static function FILTRAR_MODELO($nome_filtro)
    {
        $sql = 'SELECT id,
                       nome
                  from tb_modeloequip';
                  
        if (!empty($nome_filtro))
            $sql .= ' WHERE nome LIKE ? ';


        return $sql;
    }
}
