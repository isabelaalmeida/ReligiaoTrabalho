<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Países</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>

	</head>
	<body>
		<?php
			include "menu.inc";
		?>
		<h1>País</h1>
		<div class="centro">
		<form action="cadastro_pais.php" method="POST">
			<label>Nome País:</label>
			<input type="text" name="nome_pais"/>
			<br/><br/>
			<label>Continente:</label>
			<input type="text" name="continente" />
			<br/>
			<input type="submit" value="Enviar" />
		</form>
		</div>
	</body>
</html>