<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cria Categoria</title>
    <style>
        body{
            text-align: center;
            width: 100%;
            height: 100%;
            color: white;
            background: url("../img/img_cria1.jpg") no-repeat;
            background-size: cover;          
        }

        #criacategoria{
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
            margin-bottom:50px;
		}

        #resultado{
            margin-top: 10px;
        }        
    
        
        a{
            text-decoration:none;
            color: black;
            background-color: white;
            padding: 10px,20px;
        }

        div#categorias{
            margin-left: auto;
            margin-right: auto;
        }       

       
                       
        
    </style>
</head>
<body>
    <div id='criacategoria'>
        <h1>Criação Categoria</h1>

        <form method='GET' id="formulario">
            <input type="text" name="descricao" placeholder='Descreva a Categoria' id='desc'size='50'>
            <br><br>
            <input type="submit" value="enviar">      
            <button type='button'> <a href="escolha.php">Voltar</a>
              
            </button>  

        </form>

        <div id='resultado'>
        
        
        </div>

        <div id='categorias'>
        

        
        </div>

    </div> 


</body>
</html>

<script>

       
        var form = document.getElementById('formulario');
        var campo = document.getElementById('desc');
        var categ = document.getElementById('categorias');
        //console.log(campo);

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            gravarcateg(campo);
        
        });

            var descr = document.getElementById('desc').value;

            
            function gravarcateg(descr){
                var request = new XMLHttpRequest();
                    request.onreadystatechange = function() {
                        if(request.readyState === 4 && request.status === 200) {
                            document.getElementById('resultado').innerHTML = request.responseText;
                            atualizaCat();
                        }
                    }
                    request.open('get', `gravarcategoria.php?descricao=${descr.value}`, true);
                    request.send();
            }

            window.onload = function(e){ 
                atualizaCat();
                
            }


            function atualizaCat() {
                var request = new XMLHttpRequest();
                    request.onreadystatechange = function() {
                        if(request.readyState === 4 && request.status === 200) {
                            let jsonFormatado = JSON.parse(request.responseText)// transforma o texto em obj
                            //document.getElementById('categorias').innerHTML = `<pre>${JSON.stringify(jsonFormatado)}</pre>`; // formata string cm o stringify o <pre>
                             var inicioTabela = `<table style="width:50%; margin-left: 25% !important;">
                                            <tr>
                                                <th>Cod</th>
                                                <th>Descrição</th> 
                                            
                                            </tr>`;

                                        
                                var  fimTabela = `</table>`;

                                var meiotabela = ``;

                                for(var i=0; i<jsonFormatado.length;i++){
                                    meiotabela+=`<tr>
                                                    <td>${jsonFormatado[i].id}</td> 
                                                    <td>${jsonFormatado[i].descricao}</td> 
                                                </tr>`;

                                }
                                
                                document.getElementById('categorias').innerHTML = `${inicioTabela} ${meiotabela} ${fimTabela}`;

                            
                        }
                    }

                    request.open('get', `dadosCategoria.php`, true);
                    request.send();
            }
    </script>
