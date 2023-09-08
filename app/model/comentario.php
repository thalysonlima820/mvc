<?php

use Illuminate\Support\Arr;

    class comentario
    {
        public static function selecionarComentario($idpost)
        {
            $con = connection::GetConn();

            $sql = "SELECT * FROM comentario WHERE id_postagem = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $idpost, PDO::PARAM_INT);
            $sql->execute();

            $resultado = array();

            while($row = $sql->fetchObject('comentario')){
                $resultado[] = $row;
            }

            return $resultado;
        }
    }