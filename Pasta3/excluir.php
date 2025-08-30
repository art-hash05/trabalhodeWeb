<?php
include_once("persistir.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $filmes = buscarDados("filmes.json");

    $filmes = array_filter($filmes, fn($f) => $f['id'] !== $id);

    salvarDados(array_values($filmes), "filmes.json");
}

header("Location: principal.php");
exit;
