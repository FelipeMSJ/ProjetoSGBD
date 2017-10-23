<?php
include_once("php/conectardb.php");
include_once('php/userClass.php');

$con = getDB();
$cj_select = "SELECT id_cj, razao_social from comissao_jogos";
$result_cj = $con->prepare($cj_select);
$result_cj->execute();

$userClass = new userClass();

$errorMsgLogin='';

if (!empty($_POST['loginSubmitCliente'])) {
	$cpf=$_POST['cpf'];
	if(strlen(trim($cpf))){
		$uid=$userClass->userLoginCliente($cpf);
		if($uid){
			$url='cliente.php';
			header("Location: $url");
		}
		else{
			$errorMsgLogin="Deu ruim no login.";
		}
	}
}

if (!empty($_POST['loginSubmitCassino'])) {
	$nome=$_POST['nome'];
	if(strlen(trim($nome))){
		$uid=$userClass->userLoginCassino($nome);
		if($uid){
			$url='cassino.php';
			header("Location: $url");
		}
		else{
			$errorMsgLogin="Deu ruim no login.";
		}
	}
}

if (!empty($_POST['loginSubmitCJ'])) {
	$razao_social=$_POST['razao_social'];
	if(strlen(trim($razao_social))){
		$uid=$userClass->userLoginCJ($razao_social);
		if($uid){
			$url='razao_social.php';
			header("Location: $url");
		}
		else{
			$errorMsgLogin="Deu ruim no login.";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
  	<title>Cadastro/Login</title>
  	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style_login.css">
</head>

<body>
  	<div class="form">
      	
  		<ul class="tab-group">
        	<li class="tab active"><a href="#cliente">Cadastrar</a></li>
        	<li class="tab"><a href="#loginCliente">Conectar</a></li>
      	</ul>

      
      	<div class="tab-content">

      		
        	<div id="cliente">   
          		<h1>Cliente</h1>
        		<ul class="tab-group">
        			<li class="tab"><a href="#cliente">Cliente</a></li>
        			<li class="tab"><a href="#cassino">Cassino</a></li>
        			<li class="tab"><a href="#cj">Comissão de Jogos</a></li>
      			</ul>
	        	<form action="php/addCliente.php" method="POST" name="signup">
	          		
		        	<div class="field-wrap">
		            	<label>
		                	CPF<span class="req">*</span>
		            	</label>
		        		<input type="number" name="cpfReg" required autocomplete="off" />
		        	</div>

			        <div class="field-wrap">
			            <label>
			            	Nome<span class="req">*</span>
			            </label>
			            <input type="text" name="nomeReg" required autocomplete="off"/>
			        </div>
			          
			        <div class="field-wrap">
			            <label>
			            	Telefone<span class="req">*</span>
			        	</label>
			        	<input type="number" name="telefoneReg" required autocomplete="off"/>
			        </div>
			          
			        <div class="field-wrap">
			            <label>
			            	CEP<span class="req">*</span>
			        	</label>
			        	<input type="number" name="cepReg" required autocomplete="off"/>
			        </div>
			         
			        <div class="field-wrap">
			            <label>
			            	Bairro<span class="req">*</span>
			        	</label>
			        	<input type="text" name="bairroReg" required autocomplete="off"/>
			        </div>

			        <div class="field-wrap">
			            <label>
			            	Cidade<span class="req">*</span>
			        	</label>
			        	<input type="text" name="cidadeReg" required autocomplete="off"/>
			        </div>

			        <div class="field-wrap">
			            <label>
			            	Rua<span class="req">*</span>
			        	</label>
			        	<input type="text" name="ruaReg" required autocomplete="off"/>
			        </div>

			        <div class="field-wrap">
			            <label>
			            	Estado<span class="req">*</span>
			        	</label>
			        	<input type="text" name="estadoReg" required autocomplete="off"/>
			        </div>

			        <button type="submit" class="button button-block" name="signupCliente" value="Signup"/>Cadastrar</button>
		          
	        	</form>
        	</div> <!-- cliente -->
        
	        <div id="cj">   
	        	<h1>Comissão de Jogos</h1>
	          	<ul class="tab-group">
        			<li class="tab"><a href="#cliente">Cliente</a></li>
        			<li class="tab"><a href="#cassino">Cassino</a></li>
        			<li class="tab"><a href="#cj">Comissão de Jogos</a></li>
      			</ul>
	        	<form action="php/addCJ.php" method="POST" name="signup">
	          
	            	<div class="field-wrap">
	            		<label>
	            			Razão Social<span class="req">*</span>
	            		</label>
	            		<input type="text" id="razao_social" name="razao_social" required autocomplete="off"/>
	          		</div>
	          
	          		<button type="submit" class="button button-block" name="signupCJ" value="Signup"/>Cadastrar</button>
	          
	          	</form>

	        </div> <!-- cj -->

	        <div id="cassino">   
	        	<h1>Cassino</h1>
	          	<ul class="tab-group">
        			<li class="tab"><a href="#cliente">Cliente</a></li>
        			<li class="tab"><a href="#cassino">Cassino</a></li>
        			<li class="tab"><a href="#cj">Comissão de Jogos</a></li>
      			</ul>
	        	<form action="php/addCassino" method="post" name="signup">
	          
	            	<div class="field-wrap">
	            		<label>
	            			Nome<span class="req">*</span>
	            		</label>
	            		<input type="text" name="nomeReg" required autocomplete="off"/>
	          		</div>
	          
	          		<div class="field-wrap">
	            		<label>
	              			Comissão de Jogos<span class="req">*</span>
	            		</label>
	            		<select name="cjSelect">
	            			<?php
	            				while ($comissao = $result_cj->fetch(PDO::FETCH_ASSOC)) {
	            					?><option value="<?php echo $comissao['id_cj'] ?>"><?php echo $comissao['razao_social'] ?></option><?php
	            				}
	            			?>
	            		</select>
	          		</div>
	          		

	          		<div class="field-wrap">
		            	<label>
		                	CEP<span class="req">*</span>
		            	</label>
		        		<input type="number" name="cepReg" required autocomplete="off" />
		        	</div>

		        	<div class="field-wrap">
		            	<label>
		                	Bairro<span class="req">*</span>
		            	</label>
		        		<input type="text" name="bairroReg" required autocomplete="off" />
		        	</div>

		        	<div class="field-wrap">
			            <label>
			            	Cidade<span class="req">*</span>
			        	</label>
			        	<input type="text" name="cidadeReg" required autocomplete="off"/>
			        </div>

			        <div class="field-wrap">
			            <label>
			            	Rua<span class="req">*</span>
			        	</label>
			        	<input type="text" name="ruaReg" required autocomplete="off"/>
			        </div>

			        <div class="field-wrap">
			            <label>
			            	Estado<span class="req">*</span>
			        	</label>
			        	<input type="text" name="estadoReg" required autocomplete="off"/>
			        </div>
			        
	          		<button type="submit" class="button button-block" name="signupSubmit" value="Signup"/>Cadastrar</button>
	          
	          	</form>

	        </div> <!-- cassino -->
        	
	        <div id="loginCliente">   
	          	<h1>Conectar</h1>
	          
	          	<ul class="tab-group">
        			<li class="tab"><a href="#loginCliente">Cliente</a></li>
        			<li class="tab"><a href="#loginCassino">Cassino</a></li>
        			<li class="tab"><a href="#loginCJ">Comissão de Jogos</a></li>
      			</ul>
	          	<form action="" method="post" name="login">
	          
		            <div class="field-wrap">
			            <label>
			              	CPF<span class="req">*</span>
			            </label>
			            <input type="number" name="cpf" required autocomplete="off"/>
		          	</div>
	          
	          		<button class="button button-block" name="loginSubmitCliente" value="Login"/>Entrar</button>
	          
	          	</form>

	        </div>

	        <div id="loginCassino">   
	          	<h1>Conectar</h1>
	          
	          	<ul class="tab-group">
        			<li class="tab"><a href="#loginCliente">Cliente</a></li>
        			<li class="tab"><a href="#loginCassino">Cassino</a></li>
        			<li class="tab"><a href="#loginCJ">Comissão de Jogos</a></li>
      			</ul>
	          	<form action="" method="post" name="login">
	          
		            <div class="field-wrap">
			            <label>
			              	Nome<span class="req">*</span>
			            </label>
			            <input type="text" name="nome" required autocomplete="off"/>
		          	</div>
	          
	          		<button class="button button-block" name="loginSubmitCassino" value="Login"/>Entrar</button>
	          
	          	</form>

	        </div>

	        <div id="loginCJ">   
	          	<h1>Conectar</h1>
	          
	          	<ul class="tab-group">
        			<li class="tab"><a href="#loginCliente">Cliente</a></li>
        			<li class="tab"><a href="#loginCassino">Cassino</a></li>
        			<li class="tab"><a href="#loginCJ">Comissão de Jogos</a></li>
      			</ul>
	          	<form action="" method="post" name="login">
	          
		            <div class="field-wrap">
			            <label>
			              	Razão Social<span class="req">*</span>
			            </label>
			            <input type="text" name="razao_social" required autocomplete="off"/>
		          	</div>
	          
	          		<button class="button button-block" name="loginSubmitCJ" value="Login"/>Entrar</button>
	          
	          	</form>

	        </div>

      	</div><!-- tab-content -->
      
	</div> <!-- /form -->
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index_login.js"></script>

</body>
</html>
