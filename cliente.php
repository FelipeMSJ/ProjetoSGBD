<?php
include_once("php/conectardb.php");

$con = getDB();
$cj_select = "SELECT id_cj, razao_social from comissao_jogos";
$result_cj = $con->prepare($cj_select);
$result_cj->execute();


?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
  	<title>Área do Cliente</title>
  	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style_login.css">
</head>

<body>
  	<div class="form">
      	
  		<ul class="tab-group">
        	<li class="tab active"><a href="#ficha">Adquirir Ficha</a></li>
        	<li class="tab"><a href="#aposta">Apostar</a></li>
        	<li class="tab"><a href="#visualizar">Visualizar Apostas</a></li>
      	</ul>

      
      	<div class="tab-content">

      		
        	<div id="ficha">   
          		<h1>Adquirir Ficha</h1>
	        	<form action="php/adqFicha.php" method="POST" name="adqFicha">
	          		
		        	<div class="field-wrap">
		            	<label>
		                	CPF<span class="req">*</span>
		            	</label>
		        		<input type="text" name="cpfReg" required autocomplete="off" />
		        	</div>

			        <button type="submit" class="button button-block" name="signupCliente" value="Signup"/>Adquirir Ficha</button>
		          
	        	</form>
        	</div> <!-- cliente -->
        
	        <div id="aposta">   
	        	<h1>Realizar Aposta</h1>
	        	<form action="php/realAposta.php" method="POST" name="realAposta">
	            	<div class="field-wrap">
	            		<label>
	            			Razão Social<span class="req">*</span>
	            		</label>
	            		<input type="text" id="razao_social" name="razao_social" required autocomplete="off"/>
	          		</div>
	          
	          		<button type="submit" class="button button-block" name="signupCJ" value="Signup"/>Realizar Aposta</button>
	          
	          	</form>

	        </div> <!-- cj -->

	        <div id="visualizar">   
	        	<h1>Apostas Realizadas</h1>
	        	<form action="" name="visAposta">
	          
	            	<div class="field-wrap">
	            		<label>
	            			Nome<span class="req">*</span>
	            		</label>
	          		</div>
	          	</form>

	        </div> <!-- cassino -->
        
      	</div><!-- tab-content -->
      
	</div> <!-- /form -->
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index_login.js"></script>

</body>
</html>
