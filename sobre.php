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


	$sobre = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce lobortis felis nibh, ut blandit augue placerat interdum. Aliquam leo tortor, auctor id lacus nec, sagittis euismod turpis. Maecenas porttitor nulla lacus, ac eleifend nisl aliquam eu. Pellentesque in viverra augue. Nullam commodo, purus non tincidunt lobortis, odio lorem dapibus elit, ut euismod urna velit in quam. Phasellus magna nulla, malesuada in neque id, facilisis tincidunt justo. Ut porttitor velit ac aliquet facilisis. Pellentesque in consectetur enim, eu rhoncus ipsum. Pellentesque hendrerit, ante id feugiat porttitor, eros mauris dapibus felis, ac varius leo nisl nec massa. Nunc posuere velit a condimentum ultricies. Duis varius facilisis tellus, id vestibulum dui ornare ultricies. Duis quis ante dignissim, bibendum eros non, rhoncus nunc. Integer ullamcorper ex congue nunc placerat hendrerit. Etiam semper sollicitudin odio quis congue. Ut non leo vulputate, euismod massa quis, volutpat leo. <br>

		Praesent volutpat dictum ultricies. Curabitur tristique mi id scelerisque lacinia. Proin bibendum vel justo sit amet ornare. In eget ex 
		mattis, sagittis neque ac, aliquam libero. Donec venenatis semper ipsum sit amet scelerisque. Sed euismod, enim ut facilisis fringilla,
		 est mi ultrices risus, a blandit massa eros eu ipsum. Curabitur velit enim, volutpat at ex eu, hendrerit hendrerit neque. Donec 
		 scelerisque, lectus sit amet finibus vulputate, magna nibh sagittis lectus, sed dignissim lorem lorem at leo. Praesent lacinia 
		 ullamcorper vehicula. Nullam ullamcorper metus a hendrerit placerat. Morbi suscipit euismod finibus. In hac habitasse platea dictumst. 
		 Sed rutrum nunc sapien, sed aliquam odio tristique quis. Fusce eu accumsan ipsum. <br>

		Mauris malesuada, sapien a placerat suscipit, ipsum velit varius tellus, eu finibus justo tellus in sapien. Morbi arcu dui, porttitor ac vehicula nec, sagittis eu arcu. Vivamus blandit egestas est a feugiat. Nam egestas orci ut nisi accumsan dignissim. Fusce sollicitudin est vitae justo ornare hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas pulvinar diam lectus, ac maximus mauris condimentum eu. Aliquam erat volutpat. Vestibulum eget porta erat. Ut consectetur molestie velit, ornare dignissim neque sodales et. Aliquam ac mi viverra, pharetra sem in, gravida tortor. Sed id consequat nisi. <br>

			Morbi quis odio id tortor ultrices aliquam non tristique purus. Aliquam dolor quam, posuere sed enim sagittis, blandit bibendum eros. Maecenas mauris eros, volutpat sit amet consectetur nec, cursus vel ipsum. Nullam viverra commodo erat at hendrerit. Nullam ac metus et neque imperdiet hendrerit.<br> Nam efficitur lectus orci, pharetra fermentum purus euismod vel. Donec lobortis porttitor enim, nec fermentum orci faucibus nec. Fusce sit amet sodales tellus. Nulla convallis rhoncus felis sit amet vestibulum. Aliquam non enim sit amet diam convallis sodales.";

	abreTag("div", array("class"=>"conteudo"));
		abreTag("section");
			abreTag("h1");
				echo("Sobre");
			fechaTag("h1");	
			abreTag("p", array("class"=>"post"));
				echo("$sobre");
			fechaTag("p");
		fechaTag("section");
	fechaTag("div");
		
    include("rodape.php");
    
    
 ?>