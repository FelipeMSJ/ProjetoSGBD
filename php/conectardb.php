<?php 
	session_start();

	/* DATABASE CONFIGURATION */
	define('host', '127.0.0.1:3307');
	define('login', 'root');
	define('senha', '');
	define('db', 'cassino_db');
	//define("BASE_URL", "http://localhost/projeto_dw/login/");

	function getDB(){
		$host = host;
		$login = login;
		$db = db;
		$senha = senha;
		
		try{
			//Criar a conexão
			$con = new PDO("mysql:host=$host; dbname=$db",$login, $senha, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
			return $con;
		}
		catch(PDOException $e){
			echo 'Conecção com o Banco de Dados falhou: ' . $e->getMessage();
		}
	}
?>