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
  	<title>Cadastro/Login</title>
  	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style_login.css">
</head>

<body>
  	<div class="form">
      	
  		<ul class="tab-group">
        	<li class="tab active"><a href="#cliente">Cadastrar</a></li>
        	<li class="tab"><a href="#login">Conectar</a></li>
        	<li class="tab"><a href="#comissao">Comissão</a></li>
        	<li class="tab"><a href="#cass">Cassino</a></li>
      	</ul>
      	
      	<!--Cassino -->
		<div class="tab-content">
			<div id="cass">
				<form action="php/addDealer.php" method="POST" name="signup">
				<!--add dealer -->
				<h1>Add Dealer</h1>
				<ul class="tab-group">
        			<li class="tab"><a href="#cass">Add Dealer</a></li>
        			<li class="tab"><a href="#addFloor">Add Floorman</a></li>
        			<li class="tab"><a href="#Func">Funcionário</a></li>
        			<li class="tab"><a href="#mesa">Mesa</a></li>
        			<li class="tab"><a href="#setor">Setor</a></li>
        			<li class="tab"><a href="#jogo">Jogo</a></li>
      			</ul>
      			<div class="field-wrap">
			            <label>
			            	Nome<span class="req">*</span>
			        	</label>
			        	<input type="text" name="nomeDealer" required autocomplete="off"/>
			    </div>
      			<div class="field-wrap">
			            <label>
			            	ID Cassino<span class="req">*</span>
			        	</label>
			        	<input type="text" name="idCassino" required autocomplete="off"/>
      			</div>
      			<button type="submit" class="button button-block" name="submit" 	value="Signup"/>Adicionar
      			</button>
      			</form>
      		</div>
      		<!--fim add dealer -->
      		<!--add floorman -->
      		<div id="addFloor">
      			<form action="php/addFloorman.php" method="POST" name="signup">
      			<h1>Add Floorman</h1>
				<ul class="tab-group">
        			<li class="tab"><a href="#cass">Add Dealer</a></li>
        			<li class="tab"><a href="#addFloor">Add Floorman</a></li>
        			<li class="tab"><a href="#Func">Funcionário</a></li>
        			<li class="tab"><a href="#mesa">Mesa</a></li>
        			<li class="tab"><a href="#setor">Setor</a></li>
        			<li class="tab"><a href="#jogo">Jogo</a></li>
      			</ul>
      			<div class="field-wrap">
			            <label>
			            	Nome<span class="req">*</span>
			        	</label>
			        	<input type="text" name="nomefloor" required autocomplete="off"/>
			    </div>
      			<div class="field-wrap">
			            <label>
			            	ID Cassino<span class="req">*</span>
			        	</label>
			        	<input type="text" name="idCassino" required autocomplete="off"/>
      			</div>
      			<div class="field-wrap">
			            <label>
			            	ID Jogo<span class="req">*</span>
			        	</label>
			        	<input type="text" name="idJogo" required autocomplete="off"/>
      			</div>
      			<div class="field-wrap">
			            <label>
			            	ID Setor<span class="req">*</span>
			        	</label>
			        	<input type="text" name="idSetor" required autocomplete="off"/>
      			</div>
      			<button type="submit" class="button button-block" name="submit" 	value="Signup"/>Adicionar
      			</button>
      			</form>
      		</div>
      		<!--fim add floorman-->
			
		</div>
		<!--fim Cassino -->
		
		
		<!--Comissão -->
		<div class="tab-content">
			<div id ="comissao">
				<form action="php/addFicha.php" method="POST" name="signup">
					<h1>Adicionar Fichas de Apostas</h1>
					<div class="field-wrap">
			     	       <label>
			      	      		Valor da Ficha<span class="req">*</span>
			        		</label>
			        		<input type="text" name="valFicha" required autocomplete="off"/>
			    	</div>
			    	<div class="field-wrap">
			          	  <label>
			            		Quantidade de Fichas<span class="req">*</span>
			        	  </label>
			        	<input type="text" name="qtdFichas" required autocomplete="off"/>
			    	</div>
			    	<div class="field-wrap">
			          	  <label>
			            		ID Comissão<span class="req">*</span>
			        	  </label>
			        	<input type="text" name="idComissao" required autocomplete="off"/>
			    	</div>
			    	<button type="submit" class="button button-block" name="submit" 	value="Signup"/>Adicionar
			    	</button>
			    </form>
			</div>
		</div>
		<!--fim Comissão -->
		
		
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
		        		<input type="text" name="cpfReg" required autocomplete="off" />
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
			        	<input type="text" name="telefoneReg" required autocomplete="off"/>
			        </div>
			          
			        <div class="field-wrap">
			            <label>
			            	CEP<span class="req">*</span>
			        	</label>
			        	<input type="text" name="cepReg" required autocomplete="off"/>
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
		        		<input type="text" name="cepReg" required autocomplete="off" />
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
        
      	</div><!-- tab-content -->

	</div> <!-- /form -->
 	
 	
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index_login.js"></script>

</body>
</html>
