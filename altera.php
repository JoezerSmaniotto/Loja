<?php 
include("conecta.php");
include("funcoes.php");


$cod = $_REQUEST['procodig'];
$nome = utf8_decode($_REQUEST['pronome']);
$marca = $_REQUEST['promarca'];
$categoria = $_REQUEST['procateg'];

try {
	//colocar a data de nascimento no update
	$sql = "update produtos set pronome='$nome', promarca='$marca', procateg='$categoria' where procodig=$cod";
	$consulta = $link->prepare($sql);
	$consulta->execute();
    echo(0);
}
catch(PDOException $ex){
echo($ex->getMessage());
}	

?>