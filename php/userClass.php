<?php
class userClass{
  /* User Login */
  public function userLogin($email,$password){

    $con = getDB();
    $hash_password= hash('sha256', $password);
    $stmt = $con->prepare("SELECT uid FROM users WHERE  email=:email AND  password=:hash_password");  
    $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
    $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
    $stmt->execute();
    $count=$stmt->rowCount();
    $data=$stmt->fetch(PDO::FETCH_OBJ);
    $con = null;
    if($count) {
      $_SESSION['uid']=$data->uid;
      return true;
    }
    else {
      return false;
    }    
  }

  public function cadastroCliente($cpf, $nome, $telefone, $cep, $bairro, $cidade, $rua, $estado) {
    $con = getDB();
    
    $stmt_endereco = $con->prepare("INSERT INTO endereco(cep, bairro, cidade, rua, estado) VALUES (:cep, :bairro, :cidade, :rua, :estado)");
    $result_stmt_endereco->bindValue(':cep', $cep, PDO::PARAM_STR);
    $result_stmt_endereco->bindValue(':bairro', $bairro, PDO::PARAM_STR);
    $result_stmt_endereco->bindValue(':cidade', $cidade, PDO::PARAM_STR);
    $result_stmt_endereco->bindValue(':rua', $rua, PDO::PARAM_STR);
    $result_stmt_endereco->bindValue(':estado', $estado, PDO::PARAM_STR); 

    $stmt_cliente = $con->prepare("INSERT INTO cliente(cpf, nome, telefone) VALUES (:cpf, :nome, :telefone)");
    $result_stmt_cliente->bindValue(':cpf', $cpf, PDO::PARAM_STR);
    $result_stmt_cliente->bindValue(':nome', $nome, PDO::PARAM_STR);
    $result_stmt_cliente->bindValue(':telefone', $telefone, PDO::PARAM_STR); 
    
    if($result_stmt_cliente->execute() && $result_stmt_endereco->execute()){
      echo "Cliente adicionado com sucesso";
    }
    else {
      echo "Erro ao adicionar cliente";
    }

  }

  /* User Details */
  public function userDetails($uid){
  try{
  $con = getDB();
  $stmt = $con->prepare("SELECT email,username FROM users WHERE uid=:uid");  
  $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
  $stmt->execute();
  $data = $stmt->fetch(PDO::FETCH_OBJ);
  return $data;
  }
  catch(PDOException $e) {
  echo '{"error":{"text":'. $e->getMessage() .'}}'; 
  }

  }


}
?>