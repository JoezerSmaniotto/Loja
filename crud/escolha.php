

<!DOCTYPE html>
<html>
	<head>
	<title></title>
	
	</head>

	<meta charset="utf-8">
	<style type="text/css">
		body{
	    width: 100%;
	    height: 100%;
	    margin: 0;
	    padding: 0;
	    background: url("../img/img_crud1.jpg") no-repeat;
	    background-size: cover;
	    

		}


		.cria{
		 	width: 100%;
		  	height:107px;
		  	line-height:10px;
		  	text-align:center;
		  	background-color: rgba(10,23,55,0.7);
		  	color: white;
		  
		  	/* pura mágica */
		  	position: absolute;
		  	top: 50%; /* posiciona na metade da tela */
		  	margin-top: -25px; /* e retrocede metade da altura */


			/*text-align: center;*/
			
		}


		.cria h3{
			line-height:0px;

		}


		.cria input{

			margin-top: 10px;
		}

		.cria button{

			margin-top: 10px;
		}

		.cria button a {

			text-decoration:none; 
			color: black;
			/*background-color: red;*/
		}



	</style>
	
	<body>

		<div class="cria">		
			<h3>Escolha Uma Das Opções</h3>
			<form method="post">
                Criar Produto<input type="radio" name="op" value="produto">	
                Criar Categoria<input type="radio" name="op" value="categoria">
                <br>
                <input type="submit" name="opcao" value="Enviar">
                <button><a href="../index.php">Voltar</a></button>
			</form>
			
		</div>

	</body>
</html>



<?php
	$escolha=0;
	if(isset($_REQUEST['opcao'])){
		$escolha = $_REQUEST['op']; // alterei
		if($escolha == 'produto'){
			header("location:criaproduto.php");

		}else if($escolha == 'categoria'){
			header("location:criacategoria.php");
        }
	}

?>







