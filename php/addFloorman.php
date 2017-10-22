<?php

include("conectardb.php");

$con = getDB();

$nome_floor = $_POST['nomefloor'];
$id_cassino = $_POST['idCassino'];
$id_jogo = $_POST['idJogo'];
$id_setor = $_POST['idSetor'];

$result_stmt_floor = $con->prepare("INSERT INTO floorman(nome, cassino_id_cassino, jogo_id_jogo, setor_id_setor) VALUES (:nomefloor, :idCassino, :idJogo, :idSetor)");

$result_stmt_floor->bindParam(':nomefloor', $nome_floor, PDO::PARAM_STR);
$result_stmt_floor->bindParam(':idCassino', $id_cassino, PDO::PARAM_STR);
$result_stmt_floor->bindParam(':idJogo', $id_jogo, PDO::PARAM_STR);
$result_stmt_floor->bindParam(':idSetor', $id_setor, PDO::PARAM_STR);
$result_floor = $result_stmt_floor->execute();

if($result_floor){
  echo "Fichas adicionado com sucesso";
	echo "<script type='text/javascript'>alert('failed!')</script>";
  header('Location: ../index.php');

}

?>