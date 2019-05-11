<?php
//Faz a conexão ao banco de dados
require_once "connection/ConnectionManager.php";
$con = ConnectionManager::getInstance();
$link = $con->getConnection();

mysqli_set_charset($link, "utf8");

//Definição da array para dados JSON (o que o código entrega)
$response = array();

//Variáveis recebidas do formulário no APP - Enviadas pelo código JAVASCRIPT
$campo_do_formulario = $_POST['campo_do_formulario'];

//Texto e execução de Query no banco de dados (faz um SELECT na tabela do banco de dados)
$query = "SELECT nome_do_campo_da_tabela FROM nome_da_tabela WHERE nome_do_campo_da_tabela='$campo_do_formulario'";
mysqli_set_charset($link, "utf8");    
$result = mysqli_query($link, $query);

//se a query executada resultou em 1 ou mais linhas de registro
//prepara as variáveis e ajusta o retorno JSON
if(mysqli_num_rows($result) > 0){        
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC) )
  {
    $nome_da_variavel = $row['nome_do_campo_da_tabela'];
  }
  
  //Insere dados ao JSON
  $response['success'] = 1;

//Se não encontrou registros envia msg para o usuário e seta sucesso para 0
} else {
  $response['success'] = 0;
  $response['message'] = "Login ou senha não conferem, tente novamente.";
}

//Envia a saída em JSON para o código JAVASCRIPT
echo json_encode($response);

