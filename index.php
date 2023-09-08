<?php

require_once 'app/core/core.php';

require_once 'lib/database/connection.php';

require_once 'app/controller/HomeController.php';
require_once 'app/controller/ErroController.php';
require_once 'app/controller/PostController.php';
require_once 'app/controller/SobreController.php';
require_once 'app/controller/AdminController.php';
require_once 'app/controller/ComentarioController.php';

require_once 'app/model/postagem.php';
require_once 'app/model/comentario.php';

require_once 'vendor/autoload.php';

$templete = file_get_contents('app/template/estrutura.php');

ob_start();
$core = new core;
$core->start($_GET);

$saida = ob_get_contents();
ob_end_clean();



$tplpronto = str_replace('{{area_dinamica}}', $saida, $templete);

echo $tplpronto;
