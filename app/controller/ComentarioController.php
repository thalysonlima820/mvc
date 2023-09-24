<?php

    class ComentarioController
    {
        public function index($id)
        {
            
            $comentario = comentario::selecionarTodosComentario();

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('comen.html');

            $paramentos = array();
            $paramentos['id'] = $id;
            $paramentos['comentario'] = $comentario;
        
            $conteudo = $template->render($paramentos);
            echo $conteudo;
        }
        
        public function create($id)
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('createComenta.html');

            $paramentos = array();
            $paramentos['id'] = $id;

        
            $conteudo = $template->render($paramentos);
            echo $conteudo;
        }

        public function insert()
        {
            try{
                comentario::insert($_POST);
    
                echo '<script> alert("sucesso"); </script>';
                echo '<script> location.hrbgtef="http://localhost/mvc/index.php?pagina=Comentario&metodo=index&id={{id}}" </script>';
    
            } catch (Exception $e) {
                echo '<script> alert("' .$e->getMessage() .'"); </script>';
            }
        }

        public function change($id)
        {
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('updateComentario.html');

            $post = comentario::selecionarcomentarioid($id);

            $paramentos = array();
            $paramentos['id'] = $post->id;
            $paramentos['nome'] = $post->nome;
            $paramentos['mensagem'] = $post->mensagem;
        
            $conteudo = $template->render($paramentos);
            echo $conteudo;
        }
        public function update()
        {
    
            try{
                comentario::update($_POST);
                echo '<script> alert("sucesso"); </script>';
                echo '<script> location.href="http://localhost/mvc/index.php?pagina=Comentario&metodo=index" </script>';
    
            } catch (Exception $e) {
                echo '<script> alert("' .$e->getMessage() .'"); </script>';
            }
        }
        public function delete($id)
        {
          
            try{
                comentario::delete($id);
                echo '<script> alert("sucesso"); </script>';
                echo '<script> location.href="http://localhost/mvc/index.php?pagina=Comentario&metodo=index" </script>';
    
            } catch (Exception $e) {
                echo '<script> alert("' .$e->getMessage() .'"); </script>';
            }
         
        }

        
    }