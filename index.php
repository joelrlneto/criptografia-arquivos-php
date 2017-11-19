<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="css/index.css"/>
    <title>Crypto</title>
  </head>
  <body>
    <div class="box box-criptografia">
        <form action="app/encrypt.php" method="post" enctype="multipart/form-data">
            <div class="box-conteudo">
                <h3>Criptografar</h3>
                <label for="arquivo">Arquivo</label>
                <input type="file" name="arquivo">
                <label for="chave">Chave</label>
                <input type="text" name="chave" required id="txt-chave-criptografia" placeholder="Chave para criptografar o arquivo" title="Informe uma chave de 16 caracteres de sua preferência ou clique em Gerar uma chave">
                <button id="btn-gerar-chave">Gerar uma chave</button>
            </div>
            <div class="box-rodape">
                <input type="submit" value="Criptografar arquivo">
            </div>
        </form>
    </div>
    <div class="box box-descriptografia">
        <form action="app/decrypt.php" method="post" enctype="multipart/form-data">
            <div class="box-conteudo">
                <h3>Descriptografar</h3>
                <label for="arquivo">Arquivo</label>
                <input type="file" name="arquivo">
                <label for="chave">Chave</label>
                <input type="text" name="chave" required placeholder="Chave para descriptografar o arquivo">
            </div>
            <div class="box-rodape">
                <input type="submit" value="Descriptografar arquivo">
            </div>
        </form>
    </div>
    <script>
        window.onload = function(){
            //Pega o botão e o campo da chave e armazena em duas variáveis
            var btn = document.getElementById("btn-gerar-chave");
            var txt = document.getElementById("txt-chave-criptografia")

            //Define o que ocorrerá quando o botão "Gerar chave" for clicado
            btn.addEventListener("click", function(e){
                //Faz com que o formulário não seja enviado ao clicar no botão (que é o comportamento padrão do form)
                e.preventDefault();
                //Envia uma requisição para a página gerarChave.php
                fetch("app/gerarChave.php")
                    .then(resultado => resultado.json()) //converte o resultado para JSON (mesmo formato enviado de lá)
                    .then(json => txt.value = json.chave); //Pega o valor da chave que vem no JSON e coloca no campo de texto
            });
        }
    </script>
  </body>
</html>