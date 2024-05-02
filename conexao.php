<?php
// toda vez que for usar o mysqli
// mysqli sãos conjuto de função


// CRIAR CONTANTES PARA ARMAZENAR AS INFORMAÇÕES DE ACESSO AO BANCO DE DADOS.
// CONSTANTE.
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "agenta");
define("DB_PORT", 3306);
/**
 * abre uma conexão com o banco de dados e retorna um objeto de conexão
 * @return mysqli que é o objeto de conexão mysqli.
 */
// nosso sistema serve para explicar
function abrirbanco(){
// são o mesmo da constante, ou seja não precisa os "".
// conexão 
    $conn = new  mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
  
  // vericar se ocorreu algum erro durante a conexão
  // connect_error é uma função de verificar se teve erro
  if($conn->connect_error){
    // matará a conexão
   die(" falha na conexão: ". $conn ->connect_error);
  }
// poo
    return $conn;
}
/**
 * 
 * fechar conexão com o banco de dados
 * 
*/
 
function fecharbanco($conn){
    $conn->close();


}

// estou importando os sistema de abrir a conexão do mysqli
//  espa+ctrl ser ver a para abrir o terminal
// no terminar digitar esse comando php -S locahost:8080


?>


