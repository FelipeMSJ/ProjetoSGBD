<?php
include_once("php/conectardb.php");

$con = getDB();
$view_select = "SELECT * from view1";
$result_view = $con->prepare($view_select);
$result_view->execute();


?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
  	<title>Área do Cliente</title>
  	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style_login.css">
	<link rel="stylesheet" href="css/tabela.css">
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
	     		<div class="field-wrap">
     				<table class="flat-table">
	    				<thead>
	    					<tr>
		    					<th>Valor Apostado (R$)</th>
		    					<th>Hora da Aposta</th>
		    					<th>Número da Mesa</th>
		    					<th>Jogo</th>
		    				</tr>
	    				</thead>
	    				
	    				<tbody>
	    					<?php
		        				while ($view = $result_view->fetch(PDO::FETCH_ASSOC)) {
		        					?><tr>
		        						<td><?php echo $view['VALOR_APOSTA']; ?> </td>
		        						<td><?php echo $view['DATA_HORA_APOSTA']; ?> </td>
		        						<td><?php echo $view['ID_MESA']; ?> </td>
		        						<td><?php echo $view['NOME']; ?> </td>
		        					</tr><?php
		        				}
		        			?>
	    				</tbody>
	        				
	    			</table>
	     		</div>
    			
	        </div> <!-- cassino -->
        
      	</div><!-- tab-content -->
      
	</div> <!-- /form -->
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index_login.js"></script>

</body>
</html>
