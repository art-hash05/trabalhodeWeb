<?php

$exibirFormulario = true;
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if ($login == "ifpr" && $senha == "tads") {
        $mensagem = "Bem vindo ao TADS!";
        $exibirFormulario = false;
    } else {
        $mensagem = "Login ou senha incorretos! Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login ifpr</title>
</head>
<body>
<style>
    form{
        text-align: center;
        padding: 10px;
    }
</style>

<?php if ($mensagem != ""): ?>
    <p><?php echo $mensagem; ?></p>
<?php endif; ?>

<?php if ($exibirFormulario): ?>
<form method="post" action="">
    <label>Login: </label>
    <input type="text" name="login"><br><br>

    <label>Senha: </label>
    <input type="password" name="senha"><br><br>

    <input type="submit" value="Entrar">
</form>
<?php endif; ?>

</body>
</html>
