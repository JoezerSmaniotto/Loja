<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cria Produto</title>
    <style>
        body{
            text-align: center;
            width: 100%;
            height: 100%;
            color: white;
            background: url("../img/img_exclui1.jpg") no-repeat;
            background-size: cover;          
        }

        #criaproduto{
            /*background-color: rgba(0,0,0,0.7);*/
		 	width: 100%;
		  	height:auto;
		  	line-height:10px;
		  	text-align:center;
		  	background-color: rgba(10,23,55,0.7);
		  	color: white;
		  
		  	/* pura mágica */
		  	position: absolute;
		  	top: 30%; /* posiciona na metade da tela */
		  	margin-top: -25px; /* e retrocede metade da altura */
			
		}

        #resultado{
            margin-top: 10px;
        }        
    
        
        a{
            text-decoration:none;
            color: black;
        }       

    </style>
</head>
<body>
    

<?php
    include("../conecta.php");
    include("../funcoes.php");
   

    abreTag('div',array("id"=>"criaproduto"));

        abreTag('h1');
            echo'Criação Produto';
        fechaTag('h1');

        $sql = "select catcodig,catdescr from categorias";


        try{
            $consulta = $link->prepare($sql);
            $consulta->execute();
            abreTag("form", array("id"=>"criaprod","method"=>'get'));
                echo('<br><br>');
                abreTag('input',array('type'=>'text','name'=>'nome', 'id'=>'nome' ,'placeholder'=>'Digite o Nome Do Produto','size'=>'50'));
                echo('<br><br>');
                abreTag('input',array('type'=>'text','name'=>'marca', 'id'=>'marca','placeholder'=>'Digite o Nome Do Marca','size'=>'50'));
                echo('<br><br>');
                abreTag('input',array('type'=>'text','name'=>'preco', 'id'=>'preco','placeholder'=>'Digite o R$','size'=>'11'));
                //echo('<br><br>');
                abreTag("select",array('name'=>'escolha','id'=>'escolha'));
                    abreTag('option');
                        echo("--Categoria--"); // Ver como colocar o primeiro option sem mandar apenas aparecer
                    fechaTag('option');
                    while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
                        $codig = $registro['catcodig'];
                        $descr = $registro['catdescr'];
                        abreTag('option', array('value'=>"$codig"));
                            echo($descr);
                        fechaTag('option');
                    }
                fechaTag('select'); 
                echo('<br><br>');
                abreTag('input',array('type'=>'submit','name'=>'enviar'));
                
                abreTag('button',array('type'=>'button'));
                    abreTag("a",array("href"=>"escolha.php"));
			            echo "Voltar";	
	        		fechaTag("a");
                fechaTag('button');    
               
            fechaTag('form');


            abreTag('div', array('id'=>'resultado'));

            fechaTag('div');

            abreTag('div', array('id'=>'produtos'));
            
            fechaTag('div');
            
        } catch(PDOException $ex){
            echo ($ex->getMessage());

        }
    
    fechaTag('div');    
?>

</body>
</html>


<script>

    var form = document.getElementById('criaprod');
    var nome = document.getElementById('nome').value;
    var marca  = document.getElementById('marca').value;
    var preco  = document.getElementById('preco').value;
    var categ  = document.getElementById ('escolha').value;
    var categ = document.getElementById('produtos');

    console.log(form.nome);
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        gravar(nome,marca,preco,categ);
    
    });
    
    window.onload = function(e){ 
            atualizaProd();
                
    }


    function gravar(nome,marca,preco,categ){
        var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if(request.readyState === 4 && request.status === 200) {
                    document.getElementById('resultado').innerHTML = request.responseText;
                    atualizaProd();
                }
            }
            
            request.open("GET", `gravaproduto.php?pnome=${form.nome.value}&pmarca=${form.marca.value}&ppreco=${form.preco.value}&pcateg=${form.escolha.value}`, true);
            request.send();
    }

    function atualizaProd() {
        var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if(request.readyState === 4 && request.status === 200) {
                    let jsonFormatado = JSON.parse(request.responseText)// transforma o texto em obj
                    //document.getElementById('categorias').innerHTML = `<pre>${JSON.stringify(jsonFormatado)}</pre>`; // formata string cm o stringify o <pre>
                        var inicioTabela = `<table style="width:50%; margin-left: 25% !important;">
                                    <tr>
                                        <th>Cod</th>
                                        <th>Nome</th>
                                        <th>Categoria</th> 
                                        <th>Preço</th>  
                                        <th>Marca</th>

                                    </tr>`;

                                
                        var  fimTabela = `</table>`;

                        var meiotabela = ``;

                        for(var i=0; i<jsonFormatado.length;i++){
                            meiotabela+=`<tr>
                                            <td>${jsonFormatado[i].id}</td> 
                                            <td>${jsonFormatado[i].nome}</td>
                                            <td>${jsonFormatado[i].categoria}</td>
                                            <td>${jsonFormatado[i].preco}</td>
                                            <td>${jsonFormatado[i].marca}</td>

                                        </tr>`;

                        }
                        
                        document.getElementById('produtos').innerHTML = `${inicioTabela} ${meiotabela} ${fimTabela}`;

                    
                }
            }

            request.open('get', `dadosProduto.php`, true);
            request.send();
    }


</script>

