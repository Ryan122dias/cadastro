<?php

include "conexao.php";
//DROP TABLE PESSOA
// serve para ver as configuração
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
//exit;

 if($_SERVER ['REQUEST_METHOD']==="POST"){
  
    //captura os dados digitado no form e salva em variaveis
    //para facilitar a manuteçãodos dados
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

 
    // vamos abrir a conexão com o banco de dados
    $Conn = abrirbanco();

    // vamos criar o sql para realizar o insert dos dados no BD
    // cadastro mais index
    $sql = "INSERT INTO pessoas
    (nome,sobrenome,nascimento,endereco,telefone)
    values
    ('$nome ','$sobrenome',' $nascimento ','$endereco','$telefone')";

if ($Conn->query($sql) === true) {
    echo ":) sucesso ao cadastrar(:";
}else{
    echo":( erro ao cadastrar o contato :(";
}

fecharbanco($Conn);

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
            <li><a href="index.php">home</a></li>

            <li><a href= "cadastro.php">cadastro</a></li>
        </ul>
    </nav>
    </head>
<selection>
    
    <form action="" method="post" enctype="multipart/form-data"><br>

    <label for="nome">nome</label>
    <input type="text" id="nome" nome="nome" required>
    

    <label for="sobrenome">sobrerenome</label>
    <input type="text" id="sobrenome" nome="sobrenome" required>

    <label for="nascimento">nascimento</label>
    <input type="text" id="nascimento" nome="nascimento" required>

    <label for="endereço">endereço</label>
    <input type="text" id="endereço" nome="endereço" required>

    <label for="telefone">telefone</label>
    <input type="text" id="telefone" nome="telefone" required>

    <button type="submit">cadastro</button>
    



    </form>
</selection>


</body>
</html>