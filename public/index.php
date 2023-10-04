<?php

use app\core\core;


require_once '../vendor/autoload.php';

$templete = file_get_contents('../app/template/estrutura.php');

ob_start();
$core = new core;
$core->start($_GET);

$saida = ob_get_contents();
ob_end_clean();

$tplpronto = str_replace('{{area_dinamica}}', $saida, $templete);

echo $tplpronto;
