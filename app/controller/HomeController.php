
<?php

class HomeController
{
    public function index()
    {
        // $PaginaHome = file_get_contents('app/view/home.php');
        // echo $PaginaHome;

        try {
            $coletarPostagem = postagem::SelecionarTodos();

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $paramentos = array();
            $paramentos['postagens'] = $coletarPostagem;

            $conteudo = $template->render($paramentos);
            echo $conteudo;



            // var_dump($coletarPostagem);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
