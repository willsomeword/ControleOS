<?php

namespace Src\Model\SQL;


class SetorSQL{

    public static function INSERIR_TIPO()
    {
        $sql = 'INSERT into tb_setor (nome_setor) VALUES (?)';
        return $sql;
    }

    public static function ALTERAR_TIPO()
    {
        $sql = 'UPDATE tb_setor
                   SET nome_setor = ?
                   WHERE id = ?';
        return $sql;
    
    }

    public static function DELETE_TIPO()
    {
        $sql = 'DELETE from tb_setor
                      WHERE id = ?';
        return $sql;
                    
    }
    
    public static function FILTRAR_TIPO()
    {
        $sql = 'SELECT id, nome_setor FROM tb_setor WHERE nome_setor LIKE ?';

        return $sql;
    }

    public static function  SELECIONAR_TIPO()
    {
        $sql = 'SELECT id,
                       nome_setor
                  FROM tb_setor';   
              
        return $sql;
    }
} 
