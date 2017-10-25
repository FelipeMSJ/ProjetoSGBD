<?php 

include("conectardb.php");

$con = getDB();

$cpf = $_SESSION['cpf'];
$ficha = $_POST['fichaSelect'];
$valorAdquire = $_POST['quantidade_ficha'];

$result_select = $con->prepare("SELECT * from ficha_aposta where ID_FICHA_APOSTA = :fichaSelect");
$result_select->bindParam(':fichaSelect', $ficha, PDO::PARAM_INT);
$result_select->execute();
$total_ficha = $result_select->fetch(PDO::FETCH_ASSOC);
$total_ficha2 = $total_ficha['VALOR'];
$qnt_total = $valorAdquire * $total_ficha2;

$result_stmt_ficha = $con->prepare("INSERT INTO adquire_cliente_ficha (ID_FICHA_APOSTA, CLIENTE_CPF, VALOR_ADQUIRE, DATA_HORA_ADQUIRE) VALUES (:fichaSelect, :cpf, :quantidade_ficha, now())");
$result_stmt_ficha->bindParam(':cpf', $cpf, PDO::PARAM_STR);
$result_stmt_ficha->bindParam(':fichaSelect', $ficha, PDO::PARAM_STR);
$result_stmt_ficha->bindParam(':quantidade_ficha', $qnt_total, PDO::PARAM_INT);
$result_ficha = $result_stmt_ficha->execute();

if($result_ficha){
  echo "Ficha adquirida com sucesso";
  header("Location: ../cliente.php");

}

?>