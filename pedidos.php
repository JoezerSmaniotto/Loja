<?php
	session_start();  
	include("conecta.php");
	include("funcoes.php");
	$idUser = $_SESSION['codigo'];

	abreTag("ol");

		$sql = "select * from compras where clicodig = '$idUser'";

		try 
		{
			$consulta = $link->prepare($sql);
			$consulta->execute();
			while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
				$codigo_user = $registro['clicodig'];
				$codigo_prod = $registro['procodig'];
				$quant = $registro['qtd_prod'];
				$preco = $registro['preco_prod'];

				abreTag("li");
					echo("Codigo usuário: $codigo_user - Codigo do produto: $codigo_prod - Quantidade: $quant - Preco:  R$ $preco");
				fechaTag("li");
			}	
		}
		catch(PDOException $ex){
			echo($ex->getMessage());  
		}

	fechaTag("ol");

?>