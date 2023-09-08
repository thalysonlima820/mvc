
<?php

class AdminController
{
    public function index()
    {

            $objpostagem = postagem::SelecionarTodos();


            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('admin.html');

            $paramentos = array();
            $paramentos['postagens'] = $objpostagem;
        
            $conteudo = $template->render($paramentos);
            echo $conteudo;
    }
    
    public function create()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('create.html');

            $paramentos = array();
        
            $conteudo = $template->render($paramentos);
            echo $conteudo;
    }

    public function insert()
    {
        try{
            postagem::insert($_POST);

            echo '<script> alert("sucesso"); </script>';
            echo '<script> location.href="http://localhost/mvc/index.php?pagina=Admin&metodo=index" </script>';

        } catch (Exception $e) {
            echo '<script> alert("' .$e->getMessage() .'"); </script>';
        }
    }

    public function change($id)
    {
     

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('update.html');

            $post = postagem::selecionarPostId($id);

            $paramentos = array();
            $paramentos['id'] = $post->id;
            $paramentos['titulo'] = $post->titulo;
            $paramentos['conteudo'] = $post->conteudo;
        
            $conteudo = $template->render($paramentos);
            echo $conteudo;

    }

    public function update()
    {

        try{
            postagem::update($_POST);
            echo '<script> alert("sucesso"); </script>';
            echo '<script> location.href="http://localhost/mvc/index.php?pagina=Admin&metodo=index" </script>';

        } catch (Exception $e) {
            echo '<script> alert("' .$e->getMessage() .'"); </script>';
        }
    }

    public function delete($id)
    {
      
        try{
            postagem::delete($id);
            echo '<script> alert("sucesso"); </script>';
            echo '<script> location.href="http://localhost/mvc/index.php?pagina=Admin&metodo=index" </script>';

        } catch (Exception $e) {
            echo '<script> alert("' .$e->getMessage() .'"); </script>';
        }
     
    }
}
