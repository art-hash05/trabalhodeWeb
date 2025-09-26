<?php
include_once("persistir.php");

$filmes = buscarDados("filmes.json");

$msgErro = "";
$nome = "";
$genero = "";
$diretor = "";
$ano = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $genero = trim($_POST['genero']);
    $diretor = trim($_POST['diretor']);
    $ano = trim($_POST['ano']);

    $erros = array();
    if($nome == ''){
        array_push($erros, "Informe o nome do filme!");
    } else if(strlen($nome) <= 3){
        array_push($erros, "Informe um nome com mais de 3 caracteres!");
    }
    if($genero == ''){
        array_push($erros, "Informe o gênero!");
    }
    if($diretor == ''){
        array_push($erros, "Informe o nome do Diretor!");
    }
    if($ano == ''){
        array_push($erros, "Informe o ano em que o filme foi lançado!");
    }
    if(empty($erros)){
        //se validar, salvar no arquivo:
        $novo_filme = array(
            "id" => uniqid(),
            "nome" => $nome,
            "genero" => $genero,
            "diretor" => $diretor,
            "ano" => $ano
        );

         array_push($filmes, $novo_filme);
         salvarDados($filmes, "filmes.json");
    
         //força recarregamento para evitar reenvio
         header("location: principal.php");
    } else{
        $msgErro = implode("<br>", $erros);
    }
    
    //Abaixo está o metodo de verificação antigo
    /*if ($nome && $genero && $diretor && $ano) {
        $filmes = buscarDados("filmes.json");
        $novo = [
            "id" => uniqid(), 
            "nome" => $nome,
            "genero" => $genero,
            "diretor" => $diretor,
            "ano" => $ano
        ];

        $filmes[] = $novo;
        salvarDados($filmes, "filmes.json");

        header("Location: principal.php");
        exit;
    } else {
        $msgErro = "Preencha todos os campos!";
    }
        */
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   
    #conteudo{
        text-align: center;
        background-color: rgba(6, 6, 36, 0.73); 
        padding: 2rem;                       
        border-radius: 15px;                 
        max-width: 600px;                    
        width: 90%;                          
        margin-bottom: 2rem; 
    }
    #conteudo2{
        text-align: center;
        background-color: rgba(6, 6, 36, 0.73); 
        padding: 2rem;                       
        border-radius: 15px;                 
        max-width: 1000px;                    
        width: 90%;                          
        margin-bottom: 2rem; 
    }
    body {
        display: flex;
        justify-content: center; 
        align-items: center;  
        background-image: url("bg2.jpg");
        background-repeat: repeat-x;
        animation: moverFundo 15s linear infinite;
    }
    .form-control::placeholder {
        color: #adb5bd;
    }

    .table-container {
        max-width: 1000px;   
        margin: 0 auto;     
    }
    
    .table td, 
    .table th {
        padding: 1rem 1.5rem;  
    }

@keyframes moverFundo {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: -1920px 0; 
  }
}
    
</style>
<body class="bg-dark text-white d-flex flex-column justify-content-end">
    <br><br>
    <div id="conteudo">
   <h1>Cadastro de Filmes</h1>
    <br> <br>
   <?php if($msgErro): ?>
       <div class="alert alert-danger"><?= $msgErro ?></div>
   <?php endif; ?>

   <form method="post" class="mb-4">
       <input class="form-control bg-dark text-white" type="text" name="nome" placeholder="Nome do filme" class="form-control mb-2" value="<?=$nome?>">
       <br>
       <select class="form-control bg-dark text-white" name="genero" class="form-control mb-2">
            <option value="">--Selecione o gênero--</option>
            <option value="Drama">Drama</option>
            <option value="Ficção">Ficção</option>
            <option value="Romance">Romance</option>
            <option value="Outro">Outro</option>
       </select>
       <br>
       <input class="form-control bg-dark text-white" type="text" name="diretor" placeholder="Diretor do filme" class="form-control mb-2" value="<?=$diretor?>">
       <br>
       <input class="form-control bg-dark text-white" type="number" name="ano" placeholder="Ano de lançamento" class="form-control mb-2" value="<?=$ano?>">
       <br>
       <input class="form-control bg-dark text-white" type="submit" value="Cadastrar" class="btn btn-success">
   </form>
</div>
    <div id="conteudo2">
   <h3>Filmes cadastrados</h3>
   <div class="table-container">
   <table class="table table-bordered table-dark">
    <tr>
        <th>Nome</th> <th>Gênero</th> <th>Diretor</th> <th>Ano de Lançamento</th><th>Excluir</th>
    </tr>
    <?php foreach($filmes as $f): ?>
    <tr>
         <td><?= htmlspecialchars($f['nome']) ?></td>
         <td><?= htmlspecialchars($f['genero']) ?></td>
         <td><?= htmlspecialchars($f['diretor']) ?></td> 
         <td><?= htmlspecialchars($f['ano']) ?></td> 
         <td><a class="btn btn-danger" onclick="return confirm('Confirma a exclusão?')" href="excluir.php?id=<?= $f['id'] ?>">Excluir</a></td> 
    </tr>
    <?php endforeach; ?>
   </table>
</div>
</div>
    </body>
</html>
