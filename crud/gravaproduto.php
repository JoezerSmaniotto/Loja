<?php
include("../conecta.php");


$nome = $_REQUEST['pnome'];
$marca = $_REQUEST['pmarca'];
$preco = $_REQUEST['ppreco'];
$categ = $_REQUEST['pcateg'];
//print_r($_REQUEST);
$sql = "insert into produtos (procateg,promarca,pronome,propreco) values ($categ,'$marca','$nome',$preco)";
//echo $sql;

try {
  
	$consulta = $link->prepare($sql);
    $consulta->execute();
    echo'Produto Incluido Com Sucesso !!';
   
   
}
catch(PDOException $ex){
    //echo($ex->getMessage());
    echo'Produto Não Inserido, Verifique os campos!!';
}


?>