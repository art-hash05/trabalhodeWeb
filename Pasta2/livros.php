<?php

include_once("persistencia.php");

$livros = buscarDados("livros.json");
$msgErro = "";
$titulo = "";
$autor = "";
$genero = "";
$numPaginas = "";


if(isset($_POST['titulo'])){
    $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : NULL;
    $autor = isset($_POST['autor']) ? trim($_POST['autor']) : NULL;
    $genero = isset($_POST['genero']) ? trim($_POST['genero']) : NULL;
    $numPaginas = isset($_POST['numPaginas']) ? trim($_POST['numPaginas']) : NULL;

    //validar os dados
    $erros = array();
    if($titulo == ''){
        array_push($erros, "Informe o título");
    } else if(strlen($titulo) <= 3){
        array_push($erros, "Informe um título com mais de 3 caracteres");
    }
     if($autor == ''){
        array_push($erros,"Informe o autor");
    } if($genero == ''){
        array_push($erros,"Informe o gênero");
    } if($numPaginas == ''){
        array_push($erros,"Informe o número de páginas");
    } else if(($numPaginas) <= 0){
        array_push($erros, "O número de páginas deve ser maior que 0");
    }
     if(empty($erros)) {
        //se validar, salvar no arquivo:
    $livro = array(
        "id" => uniqid(),
        "titulo" => $titulo,
        "autor" => $autor,
        "genero" => $genero,
        "paginas" => $numPaginas
    );

    array_push($livros, $livro);
    salvarDados($livros, "livros.json");

    //forçar recarregamento para evitar reenvio
    header("location: livros.php");
    } else {
        $msgErro = implode("<br>",$erros);
    }
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    #conteudo{
        text-align: center;
    }
    body {
        display: flex;
        justify-content: center; 
        align-items: center;  
    }
    .form-control::placeholder {
        color: #adb5bd;
    }
</style>
<body class="bg-dark text-white d-flex flex-column justify-content-end">
<div id="conteudo">
    <br>
<h1>Cadastro de livros</h1>
<br><br>
<h4>Cadastre seu livro aqui</h4>
<form method="post" onsubmit="return validar()">
    
    <input class="form-control bg-dark text-white" type="text" name="titulo" id="titulo" placeholder="Informe o título" value="<?= $titulo ?>" />
    <br><br> 
    <input type="text" class="form-control bg-dark text-white" name="autor" placeholder="Inform o autor do livro" value="<?= $autor ?>">
    <br><br>
    <select class="form-control bg-dark text-white" name="genero" id="genero">
        <option value="">--Selecione o gênero--</option>
        <option value="D" <?= $genero == 'D' ? 'selected' : '' ?>>Drama</option>
        <option value="F"  <?= $genero == 'F' ? 'selected' : '' ?>>Ficção</option>
        <option value="R"  <?= $genero == 'R' ? 'selected' : '' ?>>Romance</option>
        <option value="O"  <?= $genero == 'O' ? 'selected' : '' ?>>Outro</option>
    </select>
    <br><br>

    <input class="form-control bg-dark text-white" type="number" name="numPaginas" placeholder="Informe o número de páginas" value="<?= $numPaginas ?>">
    <br><br>

    <input class="btn btn-outline-primary" type="submit" value="Enviar" />
    </div>
    <br>
</form>
<div id="divErro" style="color: red">
    <?= $msgErro; ?>    
</div>

<h3>Livros cadastrados</h3>

<table border="1" class="table table-dark">
    <tr>
        <th>ID</th> <th>Título</th> <th>Autor</th> <th>Gênero</th> <th>Quant. Páginas</th> <th>Excluir</th>
    </tr>
    <?php
    foreach($livros as $l):
    ?>
    <tr>
        <td> <?= $l['id']; ?> </td>
         <td> <?= $l['titulo']; ?> </td>
         <td><?= $l['autor']; ?> </td>
         <td> <?= $l['genero']; ?> </td> 
         <td> <?= $l['paginas']; ?> </td> 
         <td><a class="btn btn-primary" onclick="return confirm('Confirma a exclusão?')" href="excluir.php?id=<?= $l['id'] ?>">EXCLUIR</a></td> 
    </tr>
    <?php endforeach; ?>
</table>
<!--<script src="./validacao.js"></script>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>