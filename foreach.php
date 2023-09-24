<?php

$nomes = [ 'name1' => 'joao', 'name2' => 'maria', 'name3' => 'pedro'];

// Inicialize um índice para percorrer o array
// $indice = 0;

// // Use um loop while para percorrer o array e imprimir os nomes
// while ($indice < count($nomes)) {
//     echo $nomes[$indice] . "<br>";
//     $indice++;
// }

foreach($nomes as $indice => $name){
    echo "o nome é {$name} no indice {$indice}";
    echo "<br>";
}


echo "<hr>";


$cores = array("vermelho" => "maçã", "amarelo" => "banana", "laranja" => "laranja");

foreach ($cores as $cor => $fruta) {
    echo "A $fruta é da cor $cor.<br>";
}




$tam = array();

$tam['nome'] = "thalyson";
$tam['idade'] = 21;
$tam['linguagem'] = ['css', 'html'];

echo $tam['nome'] . ', ' . $tam['idade'] . ', ' . implode( ' ', $tam['linguagem']);



echo "<hr>";


$texto = "ola, a todos, or";

echo $texto . "<br>";

$remover = "or";
$remover2 = "t";

$textoEditado = preg_replace("/\,/", '. ', $texto);

$textoEditado = str_replace($remover, '| ', $textoEditado);
$textoEditado = str_replace($remover2, ' |', $textoEditado);

echo $textoEditado . "<br>";



echo "<hr>";


$cpf = '85620153002';
echo $cpf . "<br>";

$cpf_format = substr($cpf, 0,3) . '.' . substr($cpf, 3,3) . '.' . substr($cpf, 6,3) . '-' . substr($cpf, 9,2);

echo $cpf_format;


echo "<hr>";

?>


<form action="foreach.php" method="post">
<label for="">Telefone (DDD) :</label>
<input type="number" name="numero"   maxlength="11" inputmode="numeric"><br> <br>

<input class="btn" type="submit" name="enviar" value="enviar">
</form>

<?php

if(isset($_POST['enviar'])){
    $numero = $_POST['numero'];

    $limpar_numero = preg_replace("/[^0-9]/", "", $numero);
    $num_digito = strlen($limpar_numero);

    if($num_digito === 11){

        $num_digito = substr($limpar_numero, 0,0) . '(' . substr($limpar_numero, 0,2) . ') ' . substr($limpar_numero, 2,5) . '-' . substr($limpar_numero, 7,9);

        echo '<p class="numero">' . $num_digito . '<p>';
    } elseif($num_digito === 10){
        echo "hhummm vc colocou o 9 a mais depois do ddd?  ou estar faltando algum numer";
    }
    else{
        echo "numero errado";
    }

}





?>

<script>
    var btn = document.querySelector('.btn');
    var numero = document.querySelector('.numero').textContent;

        alert(numero);

</script>
