<?php
//funcoes.php

//---------------------------------------
//E:matriz com os dados da tabela
//S:nada
function geraTRs($matrizColunas){
	foreach ($matrizColunas as $linha) {
		//limpa a variavel para cada linha
		$html = "";
		abreTag("tr");
		foreach ($linha as $dado) {
			//concatena pares de valores $atributo="$valor" em $html
			$html .= "<td>$dado</td>";
		}
		echo($html);
		fechaTag("tr");
		//nova linha para formatar o código fonte
		echo("\n");
	}
}


//---------------------------------------
//E0: nome da tag
//E1: vetor associativo de atributos
//S: nada
//exemplo de chamada desta funçao
//abreTag("textarea",array("rows"=>"80",
//						   "cols"=>"50",
//						   "name"=>"mensagem"	
//							));
function abreTag($tag,$vet=array()){
   echo("<$tag");
   if (count($vet) > 0) {
	foreach($vet as $atrib => $valor){
		echo(" $atrib='$valor'");
	}
   
	}
echo(">\n");
}

//---------------------------------------
//E: nome da tag
//S: nada
function fechaTag($tag){
	echo ("</$tag>");
}

?>