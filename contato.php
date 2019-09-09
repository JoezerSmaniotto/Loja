<?php

session_start();
include("conecta.php");
include("funcoes.php");

if(isset($_SESSION['admin']))
{
    include("topo_admin.php");    
} else if(isset($_SESSION['user'])) {
        include("topo_user.php");
} else {
    include("topo.php");
}

include ("contato_form.php");

include("rodape.php");


?>