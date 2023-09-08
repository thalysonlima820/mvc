<?php

    class postagem
    {
        // private $id;
        public static function SelecionarTodos()
        {
            $con = connection::GetConn();

            $sql = "SELECT * FROM postagem ORDER BY id DESC";
            $sql = $con->prepare($sql);
            $sql->execute();

            // var_dump($sql->fetchAll());

            $resultado = array();

            while($row = $sql->fetchObject('postagem')){
                $resultado[] = $row;
            }

            if(!$resultado){
                throw new Exception("nao foi encontrado nada");
            }

            return $resultado;
        }   
            // pegar o arquivo para lançar
        public static function selecionarPostId($idpost)
        {
            $con = connection::GetConn();

            $sql = "SELECT * FROM postagem WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $idpost, PDO::PARAM_INT);
            $sql->execute();

            $resultado = $sql->fetchObject('postagem');

            if(!$resultado){
                throw new Exception("nao foi encontrado postagem");
            }else{
                $resultado->comentario = comentario::selecionarComentario($resultado->id);

                
            }

            return $resultado;
        }

        public static function insert($dadosPost)
        {
            if(empty($dadosPost['titulo']) OR empty($dadosPost['conteudo'])){
                throw new Exception("Preencha tudo");

                return false;
            }

            $con = connection::GetConn();
 
            $sql = $con->prepare('INSERT INTO postagem (titulo, conteudo) VALUES (:titu, :cont)');
            $sql->bindValue(':titu', $dadosPost['titulo']);
            $sql->bindValue(':cont', $dadosPost['conteudo']);
            $res = $sql->execute();

            // var_dump($res);

            if ($res == 0){
                throw new Exception("falha ao inserir");

                return false;
            }

            return true;
        }

        public static function update($id)
        {   
            $con = connection::GetConn();

            $sql = "UPDATE postagem SET titulo = :tit, conteudo = :con WHERE id = :id";
            $sql =$con->prepare($sql);
            $sql->bindValue(':tit', $id['titulo']);
            $sql->bindValue(':con', $id['conteudo']);
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

            $sql = "DELETE FROM postagem WHERE id = :id";
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