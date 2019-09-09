<?php 

	include("conecta.php");
	include("funcoes.php");

	$produto_id = $_REQUEST['idProd'];

	$sql = "SELECT pronome, promarca, procateg, propreco FROM produtos WHERE procodig = $produto_id";

	try {
		$consulta = $link->prepare($sql);
		$consulta->execute();
		$registro = $consulta->fetch(PDO::FETCH_ASSOC);
		echo(json_encode($registro));  // formata o array assoc do php para um obj json para usar no js
	}
	catch(PDOException $ex){
	    echo($ex->getMessage());  
	}

 ?>