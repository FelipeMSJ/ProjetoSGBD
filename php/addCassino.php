<?php

include("conectardb.php");

$con = getDB();

$nome = $_POST['nomeReg'];
$comissao_jogo = $_POST['cjSelect'];
$cep = $_POST['cepReg'];
$bairro = $_POST['bairroReg'];
$cidade = $_POST['cidadeReg'];
$rua = $_POST['ruaReg'];
$estado = $_POST['estadoReg'];

$result_stmt_endereco = $con->prepare("INSERT INTO endereco (cep, bairro, cidade, rua, estado) VALUES (:cepReg, :bairroReg, :cidadeReg, :ruaReg, :estadoReg)");
$result_stmt_endereco->bindParam(':cepReg', $cep, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':bairroReg', $bairro, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':cidadeReg', $cidade, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':ruaReg', $rua, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':estadoReg', $estado, PDO::PARAM_STR);
$result_endereco = $result_stmt_endereco->execute();
$fk_endereco = $con->lastInsertId();

$result_stmt_cassino = $con->prepare("INSERT INTO cassino (nome, id_comissao_jogos, endereco_id_endereco) VALUES (:nomeReg, :cjSelect, :fk_endereco)");
$result_stmt_cassino->bindParam(':nomeReg', $nome, PDO::PARAM_STR);
$result_stmt_cassino->bindParam(':cjSelect', $comissao_jogo, PDO::PARAM_INT);
$result_stmt_cassino->bindParam(':fk_endereco', $fk_endereco, PDO::PARAM_INT);
$result_cassino = $result_stmt_cassino->execute();

if($result_endereco && $result_cassino){
  echo "Cassino adicionado com sucesso";
  header('Location: ../index.php');

}

?>