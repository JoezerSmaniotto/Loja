<?php  

session_start();
include("conecta.php");

	$cod = $_SESSION['codigo'];
	$nome_produto = $_REQUEST['nomeProduto'];
	$quantidade = $_REQUEST['qtd'];
	$preco = $_REQUEST['Preco'];

	$sql = "select procodig from produtos WHERE pronome = '$nome_produto'";

	try {
		$consulta = $link->prepare($sql);
		$consulta->execute();
		$registro = $consulta->fetch(PDO::FETCH_ASSOC);
		$idProduto = $registro['procodig'];

		$sql = "insert into compras (clicodig, procodig, qtd_prod, preco_prod) values ($cod, $idProduto, $quantidade, $preco)"; 
	

		try {
			$consulta = $link->prepare($sql);
			$consulta->execute();
			echo("sucesso");
		}
		catch(PDOException $ex){
		    echo($ex->getMessage());  
		}
	}
	catch(PDOException $ex){
	    echo($ex->getMessage());  
	}


?>