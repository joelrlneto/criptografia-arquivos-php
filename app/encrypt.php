<?php

//Verifica se foi realmente enviado um arquivo
if(!$_FILES["arquivo"]["size"]){
    $erro = "Nenhum arquivo selecionado.";
}

//Verifica se foi realmente enviada uma chave
if(!$_POST["chave"]){
    $erro = "Chave não informada.";
}

//Verifica se a chave tem 16 caracteres
if(strlen($_POST["chave"]) != 16){
    $erro = "A chave deve ter exatamente 16 caracteres.";
}

//Caso a variável $erro tenha algum valor (das validações acima), então exibe a página de erro
//Essa variável então será impressa na página erro.php na linha 35.
if($erro){
    include "erro.php";
    die;
}

//Pega o arquivo enviado e armazena na variável $arquivo
$arquivo = $_FILES["arquivo"];

//Pega a chave enviada e armazena na variável $chave
$chave = $_POST["chave"];

//Define o método de criptografia (existem valores fixos que podem ser usados)
$metodo = "aes-256-cbc";

//O método de criptografia pede um parâmetro chamado $iv com 16 caracteres. Então passamos a mesma chave, já que ela tem 16 caracteres.
$iv = $chave;

//Lê o arquivo original que foi enviado e pega seu conteúdo
$conteudoOriginal = file_get_contents($arquivo["tmp_name"]);

//Criptografa o conteúdo do arquivo original
$conteudoCriptografado = openssl_encrypt($conteudoOriginal, $metodo, $chave, 0, $iv);

//Cria um novo nome para o arquivo que será baixado. Também removemos os espaços em branco do nome.
$novoNome = "CRIPTOGRAFADO_".str_replace(" ", "", $arquivo["name"]);

//Essa linha define que o browser fará download do arquivo, ao invés de tentar abri-lo
header("Content-Disposition: attachment; filename=".$novoNome);

//Imprimimoso conteúdo criptografado. Isso fará com que o browser baixe esse conteúdo como sendo um arquivo com o nome definido acima.
echo $conteudoCriptografado;