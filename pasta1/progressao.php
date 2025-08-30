<?php
$erros = [];

if (!isset($_GET['inicio']) || $_GET['inicio'] === '') {
    $erros[] = "Parâmetro 'inicio' não informado";
}
if (!isset($_GET['razao']) || $_GET['razao'] === '') {
    $erros[] = "Parâmetro 'razao' não informado";
}
if (!isset($_GET['quantidade']) || $_GET['quantidade'] === '') {
    $erros[] = "Parâmetro 'quantidade' não informado";
}

if (count($erros) > 0) {
    foreach ($erros as $erro) {
        echo $erro . "<br>";
    }
} else {
    $inicio = (int) $_GET['inicio'];
    $razao = (int) $_GET['razao'];
    $quantidade = (int) $_GET['quantidade'];

    echo "<h3>Progressão Aritmética:</h3>";

    for ($i = 0; $i < $quantidade; $i++) {
        $valor = $inicio + ($i * $razao);
        echo $valor . " ";
    }
}
?>

<!-- progressao.php?inicio=2&razao=3&quantidade=5 -->
