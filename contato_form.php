<!DOCTYPE html>
<html>
	<head>
	<title></title>
	<meta charset="utf-8">
	</head>

	<style type="text/css">
		
		.cont{

		    width: 100%;
		    height: 100%;
			padding-top:20px;
			background: url("img/img_cria1.jpg") no-repeat;
		    background-size: cover;
			text-align: center;
			margin-top: 76px;
		}

		button a {

			text-decoration:none; 
			color: black;
			/*background-color: red;*/
		}

		form{
			margin-bottom: 30px;
			opacity: 0.9;

		}
		h3{
			color: white;
		}

	</style>
	
	<body>
		<div class="cont">
			<h3>CONTATO</h3>
			<form action="#" method="post">
				<input type="text" name="titulo" placeholder="Digite o nome completo..." align="center" size="40">
				<br><br>
				<input type="text" name="email" placeholder="Preencha seu e-mail..." align="center" size="40">
				<br><br>
				<select name="cars">
				    <option value="noticias">Notícias</option>
				    <option value="produtos">Produtos</option>
				    <option value="diversos">Diversos</option>
			  	</select>
				<br>
				<br>
				<textarea name="conteudo" cols=80 rows=20 placeholder="Digite sua mensagem..."></textarea>
				<br>
				<br>
				<input type="submit" value="Enviar" name="enviar">		
			</form>
		</div>

	</body>
</html>