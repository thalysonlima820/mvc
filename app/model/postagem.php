<?php
namespace app\model;
use app\lib\database\connection;
use app\model\comentario;
use Exception;
use PDO;
    class postagem
    {
        // private $id;
        public static function SelecionarTodos()
        {
            $con = Connection::getConnection();

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
            $con = Connection::getConnection();

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
            // Verifique se os dados estão presentes e não estão vazios
            if (empty($dadosPost['titulo']) || empty($dadosPost['conteudo'])) {
                throw new Exception("Preencha tudo");
                return false;
            }
        
            // Use a função filter_input para verificar e filtrar os dados de entrada
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
            $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_STRING);
        
            // Verifique se os dados filtrados não estão vazios
            if (empty($titulo) || empty($conteudo)) {
                throw new Exception("Dados inválidos");
                return false;
            }
        
            $con = Connection::getConnection();

            $sql = $con->prepare('INSERT INTO postagem (titulo, conteudo) VALUES (:titu, :cont)');
            $sql->bindValue(':titu', $titulo);
            $sql->bindValue(':cont', $conteudo);
            $res = $sql->execute();
        
            if ($res == 0) {
                throw new Exception("Falha ao inserir");
                return false;
            }
        
            return true;
        }
        

        public static function update($id)
        {   
            $con = Connection::getConnection();

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
            $con = Connection::getConnection();

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