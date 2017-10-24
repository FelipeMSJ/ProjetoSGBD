<?php

include("conectardb.php");

$con = getDB();

$nome_dealer = $_POST['nomeDealer'];
$id_cassino = $_POST['idCassino'];


$result_stmt_dealer = $con->prepare("INSERT INTO dealer (nome, id_cassino) VALUES (:nomeDealer, :idCassino, :idComissao)");

$result_stmt_ficha->bindParam(':nomeDealer', $nome_dealer, PDO::PARAM_STR);
$result_stmt_ficha->bindParam(':idCassino', $id_cassino, PDO::PARAM_STR);
$result_dealer = $result_stmt_ficha->execute();


if($result_dealer){
  echo "Dealer adicionado com sucesso";
	echo "<script type='text/javascript'>alert('failed!')</script>";
  header('Location: ../index.php');

}

?>