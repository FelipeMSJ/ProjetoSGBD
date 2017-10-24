<?php

include("conectardb.php");

$con = getDB();

$cpf = $_SESSION['cpf'];
$mesa = $_POST['fichaSelect'];
$valorAposta = $_POST['quantidade_ficha'];

$result_stmt_aposta = $con->prepare("INSERT INTO aposta (CLIENTE_CPF, MESA_ID_MESA, VALOR_APOSTA, DATA_HORA_APOSTA) VALUES (:cpf, :mesaSelect, :valor_aposta, now())");
$result_stmt_aposta->bindParam(':cpf', $cpf, PDO::PARAM_STR);
$result_stmt_aposta->bindParam(':mesaSelect', $mesa, PDO::PARAM_STR);
$result_stmt_aposta->bindParam(':valor_aposta', $valorAposta, PDO::PARAM_INT);
$result_aposta = $result_stmt_aposta->execute();

if($result_aposta){
  echo "Aposta realizada com sucesso";
  header('Location: ../cliente.php');

}

?>