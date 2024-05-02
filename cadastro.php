<?php

include "conexao.php";
//DROP TABLE PESSOA
// serve para ver as configuração
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
//exit;
 if($_SERVER['REQUEST_METHOD']== "POST"){
  
    //captura os dados digitado no form e salva em variaveis
    //para facilitar a manuteçãodos dados
    $NOME = $_POST['nome'];
    $SOBRENOME = $_POST['sobrenome'];
    $NASCIMENTO = $_POST['nascimento'];
    $ENDERECO = $_POST['endereço'];
    $TELEFONE = $_POST['telefone'];

 
    // vamos abrir a conexão com o banco de dados
    $conn = abrirbanco();

    // vamos criar o sql para realizar o insert dos dados no BD
    $sql = "INSERT INTO pessoas
    (nome, sobrenome,nascimento,endereço,telefone)
    VANUES
    ('$NOME','$SOBRENOME','$NASCIMENTO','$ENDERECO','$TELEFONE)";

 


if ($conn->query($sql) == true) {
    echo ":) sucesso ao cadastrar(:";
}else{
    echo":( erro ao cadastrar o contato :(";
}

 }

?>







<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agenda</title>
</head>
<body>
    <head>
    <h1>agenda de contatos</h1>
    <nav>
        <ul>
            <li><a href="index.php">INFORMAÇÕES DO SISTEMA</a></li>

            <li><a href= "conexao.php">CONEXÃO</a></li>
        </ul>
    </nav>
    </head>
<select>
    <h2>cadastro contado</h2>
    <form action="" method="post" enctype="multipart/form-data">

    <
    <label for="nome"> nome </label>
    <input type="text" id="nome" name="nome" required>

    <label for="sobrenome">sobrenome</label>
    <input type="text" id="sobrenome" name="sobrenome" required>

    <label for="nascimento">nascimento</label>
    <input type="text" id="nascimento" name="nascimento" required>

    <label for="endereço">endereço</label>
    <input type="text" id="endereço" name="endereço" required>

    <label for="telefone">telefone</label>
    <input type="text" id="telefone" name="telefone" required>

    <button type=submit>cadastro</button>
    



    </form>
</select>


</body>
</html>