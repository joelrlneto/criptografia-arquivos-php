<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crypto | Erro</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Jura');

        body {
            background: #c4c4c4;
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;
            height: 100vh;
        }

        .box-erro {
            background:#ffffff;
            border-top:5px solid #c0392b;
            padding: 20px;
            color : red;
            text-align:center;
            font-family: "Jura";
            box-shadow: 5px 5px 5px gray;
        }
    </style>
</head>
<body>
    <div class="box-erro">
        <h1>Erro</h1>
        <!--Verifica se a variável $erro existe e se existir, imprime ela. Caso contrário, imprime só o texto "Erro". -->
        <h2><?php if($erro) echo $erro; else echo "Erro"; ?></h2>
    </div>
</body>
</html>