<?php
include'conexao.php';

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
// exit;

//capturar os dados digitalizados no form e salva em variaveis
//para facilitar a manipulação dos dados

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
   $nome = $_POST['nome'];
   $sobrenome = $_POST['sobrenome'];
   $nascimento = $_POST['nascimento'];
   $endereco = $_POST['endereco'];
   $telefone = $_POST['telefone'];

   //vamos abrir a conexao com o banco de dados
   $conexaoComBanco = abrirbanco();


   //vamos criar o SQL para realizar o insert dos dados
   $sql = "INSERT INTO pessoas
   (nome, sobrenome, nascimento, endereco, telefone)
   VALUES
   ('$nome', '$sobrenome', '$nascimento', '$endereco', '$telefone')"; 

   IF ($conexaoComBanco->query($sql) === TRUE ) {
    echo ":) sucesso ao cadastrar o contato :)";
    } else {
        echo ":( Erro ao cadastrar o contato :(";
    }

    fecharBanco($conexaoComBanco);




// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;

}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastrar.css">
    <title>agenda</title>
</head>

<body>
    <div class="pai-de-todos">

    <div class="filho">
    <header>
        <h1>Agenda de contatos</h1>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastrar.php">cadastrar</a></li>
        </ul>

    </nav>
</header>
</div>

<section >
    <h2> atualizar  Contato</h2>
<!-- action = envio,  method = metodo de envio -->
    <form action="" method="POST" enctype="multipart/form-data">

        <label for = "nome">nome</label>
        <input type="text" id="nome" name="nome"  value="<?= $registro['nome']?> " required>

        <label for = "sobrenome">sobrenome</label>
        <input type="text" id="sobrenome" name="sobrenome" value= " <?=$registro['sobrenome']?>"  required>

        <label for = "nascimento"> nascimento</label>
        <input type="date" id="nascimento" name="nascimento" value= " <?=$registro['nascimento']?>"  required>

        <label for = "endereco">endereco</label>
        <input type="text" id="endereco" name="endereco" value="<?=$registro['endereco']?>" required>

        <label for = "telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" value="<?=$registro['telefone']?>" required>

        <input type="hidden" id="id",name="id" value="<?=$registro['id']?>">
        <button type="submit">atualizar</button>
        

        </form>
    </section>
    </div>
    </div>
</body>

</html>

