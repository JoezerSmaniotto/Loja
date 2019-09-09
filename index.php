<?php

session_start();
include("conecta.php");
include("funcoes.php");

if(isset($_SESSION['admin']))
{
    include("topo_admin.php");    
} else if(isset($_SESSION['user'])) {
    include("topo_user.php");
    $codigo_user = $_SESSION['codigo'];
    $username = $_SESSION['user'];
} else {
    include("topo.php");
}

abreTag("div", array("id"=>"myCart"));
    abreTag("div", array("class"=>"close"));
        abreTag("button", array("id"=>"btn-close"));
            echo("&#x2716;");
        fechaTag("button");
    fechaTag("div");
    abreTag("table", array("width"=>"100%", "border"=>"0", "id"=>"tabela", "text-align"=>"center"));
        abreTag("caption");
            echo("Carrinho de compras");
        fechaTag("caption");
        abreTag("tr");
            abreTag("th");
                echo("Nome do produto");
            fechaTag("th");
            abreTag("th");
                echo("Marca");
            fechaTag("th");
            abreTag("th");
                echo("categoria");
            fechaTag("th");
            abreTag("th");
                echo("Preço");
            fechaTag("th");
            abreTag("th");
                echo("Quantidade");
            fechaTag("th");
            abreTag("th");
                echo("Subtotal");
            fechaTag("th");
        fechaTag("tr");
    fechaTag("table");
    abreTag("div", array("id"=>"totalFinal"));
        abreTag("p", array("id"=>"tot"));
    
        fechaTag("p");
        abreTag("button", array("id"=>"finalizar")); 
            echo ("Finalizar compra");
        fechaTag("button");
    fechaTag("div");
fechaTag("div"); 

abreTag("div", array("id"=>"request"));
    abreTag("div", array("class"=>"close"));
        abreTag("button", array("id"=>"button-close"));
            echo("&#x2716;");
        fechaTag("button");
    fechaTag("div");
    abreTag("h2", array("align"=>"center"));
        echo("Meus pedidos");
    fechaTag("h2");
    abreTag("div", array("id"=>"lista"));

    fechaTag("div");
fechaTag("div");      

abreTag("section", array("id"=>"compras"));

    $sql = "select procodig, pronome, promarca, procateg, propreco  from produtos";


    try{
        $consulta = $link->prepare($sql);
        $consulta->execute();

        while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
          $nome = $registro['pronome'];
          $preco = $registro['propreco'];
          $codigo = $registro['procodig'];  
          abreTag("div", array("class"=>"card")); 
            abreTag("div", array("class"=>"imagem-prod"));
                echo("image");
            fechaTag("div");
            abreTag("p", array("class"=>"nome"));
                echo($nome);
            fechaTag("p");
            abreTag("p");
                echo("R$ $preco");
            fechaTag("p");
            abreTag("button", array("id"=>"$codigo", "class"=>"addToCart"));
                echo("Buy &#xf07a;");
            fechaTag("button");
          fechaTag("div");
        }  
        
    } catch(PDOException $ex){
        echo ($ex->getMessage());

    }
fechaTag('section');
include ("rodape.php");      

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <script>


         var count = 0;  
         var btn_close = document.getElementById("btn-close");
         btn_close.addEventListener("click", fecharModal);
         var btnCompra = document.getElementsByClassName("addToCart");
         var btnFinalizar = document.getElementById("finalizar");
         btnFinalizar.addEventListener("click", finalizarCompra);
   
         for (var i = 0; i < btnCompra.length; i++) {   // Atribui eventos ao botons
            btnCompra[i].addEventListener('click', adicionar);
        }

        function mostrarPedidos () {
            var request = new XMLHttpRequest();
        
            request.onreadystatechange = function() {
                if(request.readyState === 4 && request.status === 200) {  
                    document.getElementById("lista").innerHTML = request.responseText; //Request é o nome da div dos pedidos. Neste caso!
                }
            }
            request.open('get', "pedidos.php", true);
            request.send();
        }

        var pedidos = document.getElementById('pedidos'); 
        pedidos.addEventListener("click", abrirPedidos);

         function abrirPedidos () {   
            document.getElementById('request').style.display = "block";
            mostrarPedidos();
         }

         var btn_fechar = document.getElementById("button-close");
         btn_fechar.addEventListener("click", fecharPedidos);

         function fecharPedidos() {
            document.getElementById('request').style.display = "none";
         }


         function fecharModal() {
            document.getElementById('myCart').style.display = "none";
         }

         var cart = document.getElementById('carrinho');
         cart.addEventListener("click", abrirCarrinho);

         function abrirCarrinho () {   
            document.getElementById('myCart').style.display = "block";
         }

        function adicionar(e){ 
            
            var idProduto = e.target.id;
            var request = new XMLHttpRequest();
        
            request.onreadystatechange = function() {
                if(request.readyState === 4 && request.status === 200) {
                     montaTabela(request.responseText);
                }
            }
            request.open('get', `manda_carrinho.php?idProd=${idProduto}`, true);
            request.send();
        }

        function montaTabela(objetoJSON) {       
            count++; //incremento do contador que inicialmente é zero
            var objJSON = JSON.parse(objetoJSON); //recebe o objeto JSON requisitado por AJAX e tranforma para obj js
            document.getElementById("tabela").style.display = "table"; //faz a tabela aparecer quando o primeiro item e adicionado.
            var linha = document.createElement("tr"); //cria uma TR
            linha.setAttribute("class", "row"); //seta uma class para a tr
            var table = document.getElementById("tabela"); //seleciona a tabela
            table.appendChild(linha); //seta a tr como filha da tabela

            for(var item in objJSON) { // nome das tropiedade, 
                //item corresponde as propriedades do objeto JSON. Ex: propreco
                var coluna = document.createElement("td");
                coluna.innerHTML = objJSON[item]; //Ex: objJSON[propreco]. O resultado disso vai ser o valor do preço
                linha.appendChild(coluna); //seta a linha (tr) como filha da coluna (td)
            }
            
            var input = document.createElement("input"); //cria o input responsável por contar a quantidade
            input.setAttribute("type", "number"); //tipo
            input.setAttribute("class", "qtd_prod"); //class
            input.setAttribute("id", `qtd${count-1}`); //id 
            input.setAttribute("value", "1"); //value - nem precisava eu acho
            input.setAttribute("min", "1"); //minimo
            input.setAttribute("oninput", "calculaSubTotal(event)"); //evento oniput (detecta mudança de valor)
            
            var coluna = document.createElement("td"); //cria a td para colocar o input
            coluna.setAttribute("class", "inputQtd"); //seta uma class para ela
            coluna.appendChild(input); //coloca o input dentro da td
            linha.appendChild(coluna); //coloca a td dentro da tr

            var coluna = document.createElement("td"); //cria uma td
            coluna.setAttribute("id", `total${count}`); 
            coluna.setAttribute("class", "subtotal"); //seta a uma classe
            var total = objJSON.propreco * 1; //coloca o valor padrão como o valor uniário do produto
            coluna.innerHTML = total.toFixed(2); //passa o valor para duas casas decimais
            linha.appendChild(coluna);
    
            document.getElementById("contador").innerHTML = count; //contador incrementa e printa na div com o INNERHTML
            document.getElementById("totalFinal").style.display = "block"; //botão de finalizar compra aparece
            calculaTotal(); //calcula o total a ser pago cada vez que um item é adicionado
        }

        function calculaSubTotal(event) {
            var quant_id = event.target.id; //vai pegar o id do input clicado
            var quant = event.target.value; //contem o número de produtos selecionados no input
            var indice;
            indice = quant_id.slice(3); //aqui terá o indice do vetor de subtotais
            //a função slice fatia uma string a partir do indice passado como paramêtro
            var vl_unit =  document.getElementsByClassName("row")[indice].childNodes[3]; //filho de indice 3 é selecionado na tr
            var subT = document.getElementsByClassName("subtotal")[indice]; //aqui está sendo selecionado o subtotal
            var novoSubTotal = vl_unit.innerHTML * quant; //pega o valor unitário do produto e multiplica pela quantidade
            subT.innerHTML = novoSubTotal.toFixed(2); //toFixed - serve para setar as casas após a virgula
            calculaTotal(); //chama a função para recalcular o valor total da compra
        }

        function calculaTotal() {
            var countPreco = 0;
            var subTotal = document.getElementsByClassName("subtotal"); //seleciona o array de subtotais
            var total = document.getElementById("tot"); //cria uma variável de contagem
            for (var i = 0; i < subTotal.length; i++) {
                countPreco += parseFloat(subTotal[i].innerHTML); //faz a soma dos valores de cada subtotal
            }
            
            total.innerHTML = `Total: R$${countPreco.toFixed(2)}`;
        }

        function gravarBanco(nomeProd, qtP, precoP){
            
            var request = new XMLHttpRequest();
        
            request.onreadystatechange = function() {
                if(request.readyState === 4 && request.status === 200) {
                    if(request.responseText == 'sucesso'){ // sucesso gravarBanco
                        var tabela = document.getElementById("tabela");
                        var linhas = document.getElementsByClassName("row");
                        for(var i = 0; i < linhas.length; i++)
                        {
                            tabela.removeChild(linhas[i]);    
                        }    
                        document.getElementById('myCart').style.display = "none";
                        document.getElementById('tabela').style.display = "none";
                        document.getElementById('totalFinal').style.display = "none";
                    }
                    else
                     {
                        document.getElementById("tabela").innerHTML = request.responseText;  
                     }   
                }
            }
            request.open('get', `gravarBanco.php?nomeProduto=${nomeProd}&qtd=${qtP}&Preco=${precoP}`, true); 
            request.send();
        }  


        function finalizarCompra () { 
            var rows = document.getElementsByClassName("row");
            //var ClienteId = document.getElementeProdutoe;
            for(var i = 0; i < rows.length; i++)
             {
                var nomeProduto = rows[i].childNodes[0].innerHTML; //pega o valor do indice 0      
                var preço = rows[i].childNodes[3].innerHTML; //pega o valor do indice 3 no vetor de rows
                var quant = document.getElementsByClassName("qtd_prod")[i].value; //pega o valor do input de quantidades
                gravarBanco(nomeProduto, quant, preço);
             }
             count = 0; //zera o contador
             document.getElementById("contador").innerHTML = count; //atribui zero ao contador

        }        

        </script>        
        

    </body>
</html>



