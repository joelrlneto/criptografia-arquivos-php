<?php
if(!$_FILES["arquivo"]["size"]){
    $erro = "Nenhum arquivo selecionado.";
}
    
if(!$_POST["chave"]){
    $erro = "Chave não informada.";
}
    
if(strlen($_POST["chave"]) != 16){
    $erro = "A chave deve ter exatamente 16 caracteres.";
}

if($erro){
    include "erro.php";
    die;
}

$arquivo = $_FILES["arquivo"];

$chave = $_POST["chave"];

$metodo = "aes-256-cbc";

$iv = $chave;

$conteudoOriginal = file_get_contents($arquivo["tmp_name"]);

$conteudoDescriptografado = openssl_decrypt($conteudoOriginal, $metodo, $chave, 0, $iv);

$novoNome = "DESCRIPTOGRAFADO_".str_replace(" ", "", $arquivo["name"]);

header("Content-Disposition: attachment; filename=".$novoNome);

echo $conteudoDescriptografado;