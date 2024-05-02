<?php
include "conexao.php";
if(isset($_GET['acao']) && $_GET['acao'] === 'excluir'){
    echo"eu quero deletar alguem do meu sistema";
    exit;
}




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

         <table border="1">
            
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
                
                

                // abrindo conexão com o banco de dados.
                $Conn = abrirbanco();
                 // preparara consulta sql para selecionar os dados no BD.
                 $sql = "select id,nome,sobrenome,nascimento,endereço,telefone
                   from pessoas";
                 // execultado a query(o sql no banco).
                 $result = $Conn -> query ($sql); 

                 $registro = $result-> fetch_assoc();

                 // verificar se a qury retorno registros.
              //   echo "<pre>";
              //   Print_r($registro);
              //   echo "</pre>";
              //   exit;
 
            
             if($result->num_rows> 0 ){

                while($registro = $result->fetch_assoc()){
                     
                    echo "<pre>";
                   Print_r($registro);
                    echo "</pre>";
                    exit;
                ?>
                    <td><?= $registro['id']?></td>
                    <td><?= $registro['nome']?></td>
                    <td><?= $registro['sobrenome']?></td>
                    <td><?= date("d/m/y",strtotime($registro['nascimento']))?></td>
                    <td><?= $registro['endereço']?></td>
                    <td><?= $registro['telefone']?></td>
                    <td>
                         <a href="a"><button>editor</button></a>
                         <a href="a"><button>excluir</button></a>
                         onclick="return confirm"
                         <button>Excluir</button></a>

                <?php
                }
             } else{
                // echo("<tr><td>nenhum registro no banco</td></tr>");
                ?>
                <tr>
                    <td colspan="7">nenhum registro no banco</td>
                </tr>


                <?php 
             }
               // criar um laço repetição para preencher a tabela.

               
               ?>


            </tbody>
         </table>
    </section>
</body>
</html>