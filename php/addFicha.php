<?php

include("conectardb.php");

$con = getDB();

$valor_ficha = $_POST['valFicha'];
$qtd_ficha = $_POST['qtdFichas'];
$id_comissao = $_POST['idComissao'];

$result_stmt_ficha = $con->prepare("INSERT INTO ficha_aposta (valor, quantidade, id_comissao_jogos) VALUES (:valFicha, :qtdFichas, :idComissao)");
$result_stmt_ficha->bindParam(':valFicha', $valor_ficha, PDO::PARAM_STR);
$result_stmt_ficha->bindParam(':qtdFichas', $qtd_ficha, PDO::PARAM_STR);
$result_stmt_ficha->bindParam(':idComissao', $id_comissao, PDO::PARAM_STR);
$result_ficha = $result_stmt_ficha->execute();

$message = 'This is a message.';

echo "<SCRIPT>
alert('$message');
</SCRIPT>";

if($result_ficha){
  echo "Fichas adicionado com sucesso";
	echo "<script type='text/javascript'>alert('failed!')</script>";
  header('Location: ../index.php');

}

?>