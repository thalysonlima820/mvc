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
       
        public static function insert($dadosPost)
        {
          

            $con = connection::GetConn();
            

            $sql = $con->prepare('INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nom, :men, :id)');
            $sql->bindValue(':nom', $dadosPost['nome']);
            $sql->bindValue(':men', $dadosPost['mensagem']);
            $sql->bindValue(':id', $dadosPost['id']);
            $res = $sql->execute();

            // var_dump($res);

            if ($res == 0){
                throw new Exception("falha ao inserir");

                return false;
            }

            return true;
        }

        public static function selecionarcomentarioid($idpost)
        {
            $con = connection::GetConn();

            $sql = "SELECT * FROM comentario WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $idpost, PDO::PARAM_INT);
            $sql->execute();

            $resultado = $sql->fetchObject('comentario');

            if(!$resultado){
                throw new Exception("nao foi encontrado postagem");
            }
            return $resultado;
        }
        public static function update($id)
        {   
            $con = connection::GetConn();

            $sql = "UPDATE comentario SET nome = :tit, mensagem = :con WHERE id = :id";
            $sql =$con->prepare($sql);
            $sql->bindValue(':tit', $id['nome']);
            $sql->bindValue(':con', $id['mensagem']);
            $sql->bindValue(':id', $id['id'], PDO::PARAM_INT);
            $resultado = $sql->execute();

            if ($resultado == 0){
                throw new Exception("falha ao inserir");

                return false;
            }

            return true;

        }
        public static function delete($id)
        {
            $con = connection::GetConn();

            $sql = "DELETE FROM comentario WHERE id = :id";
            $sql =$con->prepare($sql);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $resultado = $sql->execute();

            if ($resultado == 0){
                throw new Exception("falha ao inserir");

                return false;
            }

            return true;
        }

    }