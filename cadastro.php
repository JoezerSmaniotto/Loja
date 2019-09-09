<?php

include("conecta.php");

$nome =  $_REQUEST['nome'];
$email =  $_REQUEST['email'];
$senha =  $_REQUEST['senha'];

$sql = "insert into clientes (clinome,cliemail,clisenha) values ('$nome','$email','$senha')";
try {
    
	$consulta = $link->prepare($sql);
	$consulta->execute();
	echo('Cadastro realizado com sucesso, você será redirecionado em 3 segundos');
    header("Refresh: 5;url=form_cadastro.php"); 
       
}
catch(PDOException $ex){
    echo($ex->getMessage());
    echo('Erro ao cadastrar, tente novamente!');
    header("Refresh: 5;url=form_cadastro.php"); 
    header('location:form_cadastro.php');   
}
















?>
