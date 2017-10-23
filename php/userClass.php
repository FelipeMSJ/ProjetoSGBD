<?php
class userClass{
/* User Login */

	public function userLoginCliente($cpf){

		$con = getDB();
		$stmt = $con->prepare("SELECT cpf FROM cliente WHERE cpf=:cpf");  
		$stmt->bindParam(":cpf", $cpf,PDO::PARAM_STR) ;
		$stmt->execute();
		$count=$stmt->rowCount();
		$data=$stmt->fetch(PDO::FETCH_OBJ);
		$con = null;
		if($count){
			$_SESSION['cpf']=$data->cpf;
			return true;
		}
		else {
			return false;
		}    
	}

	public function userLoginCassino($nome){

		$con = getDB();
		$stmt = $con->prepare("SELECT nome FROM cassino WHERE nome=:nome");  
		$stmt->bindParam("nome", $nome,PDO::PARAM_STR) ;
		$stmt->execute();
		$count=$stmt->rowCount();
		$data=$stmt->fetch(PDO::FETCH_OBJ);
		$con = null;
		if($count){
			$_SESSION['nome']=$data->nome;
			return true;
		}
		else {
			return false;
		}    
	}

	public function userLoginCJ($razao_social){

		$con = getDB();
		$stmt = $con->prepare("SELECT razao_social FROM comissao_jogos WHERE razao_social=:razao_social");  
		$stmt->bindParam("razao_social", $razao_social,PDO::PARAM_STR) ;
		$stmt->execute();
		$count=$stmt->rowCount();
		$data=$stmt->fetch(PDO::FETCH_OBJ);
		$con = null;
		if($count){
			$_SESSION['razao_social']=$data->razao_social;
			return true;
		}
		else {
			return false;
		}    
	}

	/* User Registration */
	public function userRegistration($username,$password,$email){
		try{
			$con = getDB();
			$st = $con->prepare("SELECT uid FROM users WHERE username=:username OR email=:email");  
			$st->bindParam("username", $username,PDO::PARAM_STR);
			$st->bindParam("email", $email,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();
			if($count<1) {
				$stmt = $con->prepare("INSERT INTO users(username,password,email) VALUES (:username,:hash_password,:email)");  
				$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
				$hash_password= hash('sha256', $password);
				$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
				$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
				$stmt->execute();
				$uid=$con->lastInsertId();
				$con = null;
				$_SESSION['uid']=$uid;
				return true;
			}
			else{
				$con = null;
				return false;
			}
		} 
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}

	/* User Details */
	public function userDetailsCliente($uid){
		try{
			$con = getDB();
			$stmt = $con->prepare("SELECT cpf FROM cliente WHERE uid=:uid");  
			$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}

	}

	/* User Details */
	public function userDetailsCassino($uid){
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

	/* User Details */
	public function userDetailsCJ($uid){
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