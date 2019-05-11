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
$campo_do_formulario = $_POST['campo_do_formulario'];
//O id do registro pode ser obtido com uma instrução SELECT
$id = $_POST['id_do_registro'];

//Texto da query para atualizar a tabela
$query = "UPDATE nome_da_tabela SET nome_do_campo_da_tabela='$campo_do_formulario' WHERE id=$id";
$result = mysqli_query($link, $query);

//Reposta se a atualização foi processada ou não
if($result){
	$response["success"] = 1;
	$response["message"] = "Dados atualizados.";
}else{
  	$response["success"] = 0;
  	$response["message"] = "Houve um problema no banco de dados, tente novamente";
}


//Envia a saída em JSON
echo json_encode($response);

