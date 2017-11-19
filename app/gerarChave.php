<?php
    //Gera um número randômico de 3 dígitos (entre 100 e 999)
    $rand  = rand(100,999);
    
    //Gera um id único de 13 dígitos (essa função é do próprio PHP)
    $id    = uniqid();

    //A chave precisa ter 16 caracteres, então juntamos o número randômico com o id gerado
    $chave = $rand.$id;

    //Retorna a chave no formato JSON. Exemplo: { "chave" : "1234567890123456" }
    echo json_encode(array(
        "chave" => $chave
    ));