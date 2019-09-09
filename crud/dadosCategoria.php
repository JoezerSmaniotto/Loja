<?php
include("../conecta.php");
include("../funcoes.php");
   

$sql = "select catcodig as 'id',catdescr as 'descricao' from categorias";

$resultado='';
try{
    $consulta = $link->prepare($sql);
    $consulta->execute();
    $resultado= $consulta->fetchAll();
    
} catch(PDOException $ex){
    $resultado= array ();
    //echo ($ex->getMessage());
} finally{
    echo json_encode($resultado);

}



?>