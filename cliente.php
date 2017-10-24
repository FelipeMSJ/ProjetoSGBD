<?php
include_once("php/conectardb.php");
include_once('php/userClass.php');
include_once('php/session.php');

$userClass = new userClass();

$con = getDB();
$view_select = "SELECT * from view2";
$result_view = $con->prepare($view_select);
$result_view->execute();


$cpf=$_SESSION['cpf'];

$view_select2 = "SELECT * from view1 where CLIENTE_CPF = :cpf";
$result_view2 = $con->prepare($view_select2);
$result_view2->bindParam(':cpf', $cpf, PDO::PARAM_STR);
$result_view2->execute();

$view_select3 = "SELECT * from ficha_aposta";
$result_view3 = $con->prepare($view_select3);
$result_view3->execute();


//Join com ACF.VALOR_ADQUIRE, FA.VALOR, FA.QUANTIDADE, ACF.DATA_HORA_ADQUIRE, (CASSINO) C.NOME 
$view_select4 = "SELECT * from ficha_aposta";
$result_view4 = $con->prepare($view_select3);
$result_view4->execute();



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
	<link rel="stylesheet" href="css/checkbox.css">
	
</head>

<body>
  	<div class="form">
      	
  		<ul class="tab-group">
        	<li class="tab active"><a href="#ficha">Adquirir Ficha</a></li>
        	<li class="tab"><a href="#aposta">Apostar</a></li>
        	<li class="tab"><a href="#visFicha">Fichas Adquiridas</a></li>
        	<li class="tab"><a href="#visualizar">Visualizar Apostas</a></li>
      	</ul>

      
      	<div class="tab-content">

      		
        	<div id="ficha">   
          		<h1>Adquirir Ficha</h1>
	        	<form action="php/adqFicha.php" method="POST" name="adqFicha">
	          		
		        	<div class="field-wrap">
		            	<label>
		                	Valor<span class="req">*</span>
		            	</label>
		            	<br> <br>
		            	<select name="fichaSelect">
	            			<?php
	            				while ($ficha = $result_view3->fetch(PDO::FETCH_ASSOC)) {
	            					?><option value="<?php echo $ficha['ID_FICHA_APOSTA'] ?>">R$<?php echo $ficha['VALOR']?> - Quantidade Disponível: <?php echo $ficha['QUANTIDADE'] ?></option><?php
	            				}
	            			?>
	            		</select>
		        		
		        	</div>

		        	<div class="field-wrap">
	            		<label>
	            			Quantidade<span class="req">*</span>
	            		</label>
	            		<input type="number" id="quantidade_ficha" name="quantidade_ficha" />
	          		</div>

			        <button type="submit" class="button button-block" name="adquirirFicha" value="Signup"/>Adquirir Ficha</button>
		          
	        	</form>
        	</div> <!-- cliente -->
        	
        	<div id="visFicha">
        		<h1>Fichas Adquiridas</h1>
        		<div class="field-wrap">
        			<table class="flat-table">
	    				<thead>
	    					<tr>
		    					<th>Valor Total Adquirido (R$)</th>
		    					<th>Valor da Ficha (R$)</th>
		    					<th>Quantidade Comprada</th>
		    					<th>Hora da Aquisição</th>
		    					<th>Cassino Vinculado</th>
		    				</tr>
	    				</thead>
	    				
	    				<tbody>
	    					<?php
		        				while ($view = $result_view4->fetch(PDO::FETCH_ASSOC)) {
		        					?><tr>
		        						<td><?php echo $view['VALOR_APOSTA']; ?> </td>
		        						<td><?php echo $view['DATA_HORA_APOSTA']; ?> </td>
		        						<td><?php echo $view['ID_MESA']; ?></td>
		        						<td><?php echo $view['NOME']; ?> </td>
		        					</tr><?php
		        				}
		        			?>
	    				</tbody>
	        				
	    			</table>
        		</div>
        	</div>

	        <div id="aposta">   
	        	<h1>Realizar Aposta</h1>
	        	<form action="php/realAposta.php" method="POST" name="realAposta">
	            	
	        		<div class="field-wrap">
	        			<label>
	        				Cassino<span class="req">*</span>
	        			</label>

	        			<select name="cassinoSelect">
	            			<?php
	            				while ($mesa = $result_view4->fetch(PDO::FETCH_ASSOC)) {
	            					?><option value="<?php echo $mesa['ID_MESA'] ?>"><?php echo $mesa['ID_MESA'] ?> - <?php echo $mesa['NOME'] ?> </option><?php
	            				}
	            			?>
	            		</select>

	        		</div>


	            	<div class="field-wrap">
	            		<label>
	            			Mesa<span class="req">*</span>
	            		</label>
	            		<select name="mesaSelect">
	            			<?php
	            				while ($mesa = $result_view->fetch(PDO::FETCH_ASSOC)) {
	            					?><option value="<?php echo $mesa['ID_MESA'] ?>"><?php echo $mesa['ID_MESA'] ?> - <?php echo $mesa['NOME'] ?> </option><?php
	            				}
	            			?>
	            		</select>
	          		</div>

	            	<div class="field-wrap">
	            		<label>
	            			Valor da Aposta<span class="req">*</span>
	            		</label>
	            		<input type="number" id="valor_aposta" name="valor_aposta" />
	          		</div>
	          
	          		<button type="submit" class="button button-block" name="realizarAposta" value="Signup"/>Realizar Aposta</button>
	          
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
		        				while ($view = $result_view2->fetch(PDO::FETCH_ASSOC)) {
		        					?><tr>
		        						<td><?php echo $view['VALOR_APOSTA']; ?> </td>
		        						<td><?php echo $view['DATA_HORA_APOSTA']; ?> </td>
		        						<td><?php echo $view['ID_MESA']; ?></td>
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
