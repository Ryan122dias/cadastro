<?php
include "conexao.php";

//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
//exit;
// COLOCAR ESSE COMANDO PARA SABERMOS AS INFORMACOES DA CONEXÃO DO SISTEMA
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
    <h1>index</h1>
    <nav>
        <ul>
            <li><a href="conexao.php">CONEXÃO</a></li>

            <li><a href= "cadastro.php">CADASTRO</a></li>
        </ul>
    </nav>
    </head>

    <section>
       <h2>LISTA DE CONTATOS</h2>

         <table border="11">
            
            <thead>
                <!- lista titulo-!>
                <tr>
                    <td>id</td>
                    <td>nome</td>
                    <td>sobrenome</td>
                    <td>nascimento</td>
                    <td>endereço</td>
                    <td>telefone</td>
                    <td></td>
                </tr>
            </thead>
            <!--fazer para pegar as informações para banco é corpo da tabela-->
            <tbody>
               <?php
                 



               ?>

            </tbody>
         </table>
    </section>
</body>
</html>