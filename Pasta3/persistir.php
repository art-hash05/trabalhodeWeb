<?php


define("DIR_ARQUIVOS", "arquivos");

function salvarDados($array, $arquivo) {
    $json = json_encode($array, JSON_PRETTY_PRINT);

    file_put_contents(DIR_ARQUIVOS . "/" . $arquivo, $json);
}

function buscarDados($arquivo) : array {
    $dados = array();

    $nomeArquivo = DIR_ARQUIVOS . "/" . $arquivo;
    if(file_exists($nomeArquivo)){
        $json = file_get_contents($nomeArquivo);
        $dados = json_decode($json, true);
    }

    return $dados;
}
