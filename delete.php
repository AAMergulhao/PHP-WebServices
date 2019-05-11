<?php
//Faz a conexão ao banco de dados
require_once "connection/ConnectionManager.php";
$con = ConnectionManager::getInstance();
$link = $con->getConnection();

//configura o padrão de acentuação dos textos
mysqli_set_charset($link, "utf8");

//Definição da array para dados JSON (o que o código entrega)
$response = array();

//Variáveis recebidas do formulário no APP - Enviadas pelo código JAVASCRIPT
//O id do registro pode ser obtido com uma instrução SELECT
$id = $_POST['id_do_registro'];

//Texto da query para deletar os registros na tabela
$query = "DELETE FROM nome_da_tabela WHERE id = '$id'";
$result = mysqli_query($link, $query);

//Reposta se a atualização foi processada ou não
if($result){
	$response["success"] = 1;
	$response["message"] = "Dados excluídos.";
}else{
  	$response["success"] = 0;
  	$response["message"] = "Houve um problema no banco de dados, tente novamente";
}


//Envia a saída em JSON
echo json_encode($response);

