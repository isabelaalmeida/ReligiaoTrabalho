<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Religiões</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<?php
			include "menu.inc";
		?>
		<h1>Religião</h1>
		<div class="form">
		<form action="cadastro_religiao.php" method="POST" enctype="multipart/form-data">
			<label>Nome da Religião:</label>
			<input type="text" name="nome_religiao"/>
			<br/><br/>
			<label>Símbolo:</label>
			<input type="file" name="simbolo" />
			<br/>
			<br/><br/>
			<input type="submit" value="Enviar" />
			</div>
		</form>
	</body>
</html>