<?php

include_once("conectardb.php");

$con = getDB();

$razao_social = $_POST['razao_social'];

$result_stmt_rs = $con->prepare("INSERT INTO comissao_jogos(razao_social) VALUES (:razao_social)");
$result_stmt_rs->bindValue(':razao_social', $razao_social, PDO::PARAM_STR);
if($result_stmt_rs->execute()){
  echo "Comissão de Jogos adicionado com sucesso";

}
else{
        print_r($result_stmt_rs->errorInfo());
}

?>