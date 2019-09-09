<?php
include("../conecta.php");


$d = $_REQUEST['descricao'];
$sql = "insert into categorias (catdescr) values ('$d')";

try {
  
	$consulta = $link->prepare($sql);
    $consulta->execute();
    echo'Categoria Incluida Com Sucesso !!';
   
   
}
catch(PDOException $ex){
    echo($ex->getMessage());
    echo'Categoria Não Inserida !!';
}


?>