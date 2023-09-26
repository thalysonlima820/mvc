<?php
namespace Thaly\mvc\app\core;

class core
{
        public function start($urlget)
        {
                if( isset($urlget['metodo'])){
                        $acao =$urlget['metodo'];
                }else{
                        $acao = 'index';
                }

                if (isset($urlget['pagina'])) {
                        $controller = ucfirst($urlget['pagina'] . 'Controller');
                } else {
                        $controller = 'HomeController';
                }


                if (!class_exists($controller)) {
                        $controller = 'ErroController';
                }

                if(isset($urlget['id']) && $urlget['id'] !=null){
                        $id= $urlget['id'];
                        call_user_func_array(array(new $controller, $acao), array('id' => $id));
                }else{
                        $id = null;
                        call_user_func_array(array(new $controller, $acao), array());
                }

               


        }
}
