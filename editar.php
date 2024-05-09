<?php
include'conexao.php';
include_once'funcoes.php';
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;
if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){
    // if ternario
    $_id = isset($_GET['id']) ? $_GET['id']:0;
    
    //vamos abrir a conexão com  o banco
    $conexaoComBanco = abrirbanco();

    $sql = "select * from pessoas where id = ?";
    // preparar o sql para consultaro id no banco de dados

    $pegardados =$conexaoComBanco->prepare($sql);

    // substituir o ???????
    $pegardados-> bind_param("i",$id);
    // execudar o sql que preparamos
    $pegardados->execute();
    $result = $pegardados-> get_result();

    if($result->num_rows == 1) {
        dd ($registro);
    } else {
        echo"nenhum registro encontrado";
        exit;
    }

}
    $pegardados->close();
    fecharBanco($conexaoComBanco);


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $id =$_POST['id'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $nascimento = $_POST['nascimento'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];

        $conexaoComBanco = abrirbanco();

        $sql = "UPDATE pessoas set nome ='$nome, sobrenome = $sobrenome,
        nascimento= $nascimento, endereco =$endereco, telefone =$telefone
        where id = $id";
     
  if($conexaoComBanco-> query($sql) === true){
    echo":)sucesso ao atualizar o contato:)";
  } else{
     echo":( erro ao tualizar o contato:(";
  }
 fecharBanco($conexaoComBanco);
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
    <header>
        <h1>Agenda de contatos</h1>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cadastrar.php">cadastrar</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Lista de contatos</h2>
        <table border="1">
            <thead>
                <tr>
                    <td>id</td>
                    <td>nome</td>
                    <td>sobrenome</td>
                    <td>Nascimento</td>
                    <td>endereco</td>
                    <td>telefone</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>


                <?php
                //abrir a conexao com o banco de dados
                $conexaoComBanco = abrirbanco();
                //Preparar a consulta SQL para selecionar dados no BD
                $sql = "SELECT id, nome, sobrenome, nascimento, endereco, telefone
            From pessoas";
                // executar o query (o SQL do banco)
                $result = $conexaoComBanco->query($sql);

                // echo "<pre>";
                // print_r($registros);
                // echo "</pre>";
                // exit;
                //$registros = $result->fetch_assoc();
                //verificar se a query retornou registros
                if ($result->num_rows > 0) {
                    //ha registro no banco
                    while ($registro = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?= $registro['id'] ?></td>
                            <td><?= $registro['nome'] ?></td>
                            <td><?= $registro['sobrenome'] ?></td>
                            <td><?= date("d/m/Y", strtotime($registro['nascimento'])) ?></td>
                            <td><?= $registro['endereco'] ?></td>
                            <td><?= $registro['telefone'] ?></td>
                            <td>
                                <a href="editar.php?acao=editar&id=<?= $registro['id']?>"><button>Editar</button></a>
                                <a href="?acao=excluir&id=<?= $registro['id']?>" onclick="return('tem certezaque deseja excluir');">
                                <button>Excluir</button></a>
                            </td>
                        </tr>
                    <?php

                    }
                } else {
                    ?>
                    <!-- nao tem registro no banco -->

                    <tr>
                        <td colspan='7'>Nenhum Resgistro no banco de dados</td>
                    </tr>
                <?php
                }


                //criar um laço de repetição para preencher a tabela
                ?>

            </tbody>
        </table>

    </section>
</body>
</html>
