<?php

include("conectardb.php");

$con = getDB();

$nome = $_POST['nomeReg'];
$comissao_jogo = $_POST['cjSelect'];
$endereco = $_POST['enderecoReg'];
$cep = $_POST['cepReg'];
$bairro = $_POST['bairroReg'];
$cidade = $_POST['cidadeReg'];
$rua = $_POST['ruaReg'];
$estado = $_POST['estadoReg'];

$result_stmt_endereco = $con->prepare("INSERT INTO endereco (cep, bairro, cidade, rua, estado, endereco) VALUES (:cepReg, :bairroReg, :cidadeReg, :ruaReg, :estadoReg, :enderecoReg)");
$result_stmt_endereco->bindParam(':cepReg', $cep, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':bairroReg', $bairro, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':cidadeReg', $cidade, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':ruaReg', $rua, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':estadoReg', $estado, PDO::PARAM_STR);
$result_stmt_endereco->bindParam(':enderecoReg', $endereco, PDO::PARAM_STR);
$result_endereco = $result_stmt_endereco->execute();
$fk_endereco = $con->lastInsertId();

$result_stmt_cassino = $con->prepare("INSERT INTO cassino (nome, comissao_jogos_id_cj, endereco_id_endereco) VALUES (:nomeReg, :cjSelect, :fk_endereco)");
$result_stmt_cassino->bindParam(':nomeReg', $nome, PDO::PARAM_STR);
$result_stmt_cassino->bindParam(':cjSelect', $comissao_jogo, PDO::PARAM_INT);
$result_stmt_cassino->bindParam(':fk_endereco', $fk_endereco, PDO::PARAM_INT);
$result_cassino = $result_stmt_cassino->execute();

if($result_endereco && $result_cassino){
  echo "Cassino adicionado com sucesso";
  header('Location: ../index.php');

}

?>