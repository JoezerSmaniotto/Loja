<?php
include("../conecta.php");
include("../funcoes.php");
   

$sql = "select procodig as 'id',pronome as 'nome', procateg as 'categoria', propreco as 'preco', 
promarca as 'marca' from produtos";

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