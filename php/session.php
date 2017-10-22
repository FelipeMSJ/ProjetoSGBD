 <?php
if(!empty($_SESSION['cpf'])){
	
	$session_uid=$_SESSION['cpf'];
	include_once('userClass.php');
	$userClass = new userClass();
	
}

if(empty($session_uid)) {
	
$url='../ProjetoSGBD/index.php';
header("Location: $url");
	
}
?>