<?php
//Faz a conexão ao banco de dados
require_once "connection/ConnectionManager.php";
$con = ConnectionManager::getInstance();
$link = $con->getConnection();

mysqli_set_charset($link, "utf8");

//Definição da array para dados JSON (o que o código entrega)
$response = array();

//Variáveis recebidas do formulário no APP - Enviadas pelo código JAVASCRIPT
$cnome = $_POST['cnome'];
$cemail = $_POST['cemail'];
$csenha = $_POST['csenha'];
$cconfirmar_senha = $_POST['cconfirmar_senha'];



//Instrucao para o MySQL
$query = "INSERT INTO usuarios (nome, email, senha, confirmar_senha) VALUES ('$cnome','$cemail','$csenha','$cconfirmar_senha');";

//PROCESSA A QUERY E GUARDA O RESULTADO NA VARIÁVEL
//$result (TRUE ou outro resultado)
$result2 = mysqli_query($link, $query);


//SE A INSERÇÃO FOI PROCESSADA ($result = true) ENVIA MENSAGEM DE ACERTO
//CASO CONTRÁRIO EXIBE MENSAGEM DE ERRO NA ARRAY ASSOCIATIVA "$response"
if($result2){
	$response["success"] = 1;
	
}else{
  	$response["success"] = 0;
  	$response["message"] = "Houve um problema no banco de dados, tente novamente";
}


//Envia a saída em JSON
echo json_encode($response);

