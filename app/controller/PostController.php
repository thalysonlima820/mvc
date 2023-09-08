
<?php

class PostController
{
    public function index($id)
    {

        try {
            $postagem = postagem::selecionarPostId($id);

           

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $paramentos = array();
            $paramentos['titulo'] = $postagem->titulo;
            $paramentos['conteudo'] = $postagem->conteudo;
            $paramentos['comentario'] = $postagem->comentario;

            $conteudo = $template->render($paramentos);
            echo $conteudo;


        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
