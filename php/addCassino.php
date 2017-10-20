<?php

include("conectardb.php");

$con = getDB();

$razao_social = $_POST['razao_social'];

$result_stmt_rs = $con->prepare("INSERT INTO comissao_jogos(razao_social) VALUES (:razao_social)");
$result_stmt_rs->bindParam(':razao_social', $razao_social, PDO::PARAM_STR);
$result = $result_stmt_rs->execute();
if($result){
  echo "Comissão de Jogos adicionado com sucesso";
  header('Location: ../index.php');

}

?>