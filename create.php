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

//Instrucao para o MySQL
$query = "INSERT INTO nome_da_tabela (nome_do_campo_da_tabela) VALUES ('$campo_do_formulario');";

//PROCESSA A QUERY E GUARDA O RESULTADO NA VARIÁVEL
//$result (TRUE ou outro resultado)
$result = mysqli_query($link, $query);


//SE A INSERÇÃO FOI PROCESSADA ($result = true) ENVIA MENSAGEM DE ACERTO
//CASO CONTRÁRIO EXIBE MENSAGEM DE ERRO NA ARRAY ASSOCIATIVA "$response"
if($result2){
	$response["success"] = 1;
	$response["message"] = "Dados Inseridos.";
}else{
  	$response["success"] = 0;
  	$response["message"] = "Houve um problema no banco de dados, tente novamente";
}


//Envia a saída em JSON
echo json_encode($response);

