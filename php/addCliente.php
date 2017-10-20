<?php

include("conectardb.php");

$con = getDB();

$cpf = $_POST['cpfReg'];
$nome = $_POST['nomeReg'];
$telefone = $_POST['telefoneReg'];
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

$result_stmt_cliente = $con->prepare("INSERT INTO cliente (cpf, nome, telefone, endereco_id_endereco) VALUES (:cpfReg, :nomeReg, :telefoneReg, :fk_endereco)");
$result_stmt_cliente->bindParam(':cpfReg', $cpf, PDO::PARAM_STR);
$result_stmt_cliente->bindParam(':nomeReg', $nome, PDO::PARAM_STR);
$result_stmt_cliente->bindParam(':telefoneReg', $telefone, PDO::PARAM_STR);
$result_stmt_cliente->bindParam(':fk_endereco', $fk_endereco, PDO::PARAM_STR);
$result_cliente = $result_stmt_cliente->execute();

if($result_endereco && $result_cliente){
  echo "Cliente adicionado com sucesso";
  header('Location: ../index.php');

}

?>