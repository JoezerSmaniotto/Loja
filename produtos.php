<html>
    <head>
        <title>Produtos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style>
			.dvLinha {
				clear:both;
			}
			.dvLinha:nth-child(odd){
				background-color:lightgray;
			}
			.dvLinha:nth-child(even) {
				background-color:white;
			}
		</style>
    </head>
	<body onload='carregaProdutos();carregaCategorias();'>
	Incluir produto:
			<form method="post" id="form1">
			Codigo:<input type="text" name="procodig" id="procodig" size="3" readonly="readonly"><br>
			Nome:<input type="text" name="pronome" id="pronome"><br>
			Marca:<input type="text" name="promarca" id="promarca"><br>
			Categoria:<select name="procateg" id="procateg">
					 </select><br>
			<input type="button" name="enviar" value="OK" id="btSubmit"><br>
			<input type="button" name="salvar" value="Salvar" id="btSalvar">
		</form>

		<h1>Produtos</h1>
		<div id="lista">
			
		</div>
		
		<script src="serialize.js"></script>
		<script src="produtos.js"></script>
    </body>
</html>