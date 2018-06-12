<!DOCTYPE html>
<html>
	<head>
		<title>Alteração País</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
	<?php

	include "menu.inc";
	include "conexao.php";
	
	$sql ="select * from pais WHERE id_pais =".$_GET["id_pais"];

	$resultado = mysqli_query($link,$sql) or die (mysqli_error($link));

	$linha = mysqli_fetch_array($resultado);

	$cod_pais=$linha["id_pais"];
	?> 
	  <h2>Alteração de País</h2>
		<form method="POST"  action="alterando_pais.php">
		<div class="form">
			<label>Nome País:</label>
			<input type="text" name="nome_pais" value="<?=$linha["nome_pais"]?>" />
			<br/> <br/>
			<label>Continente:</label>
			<input type="text" name="continente" value="<?=$linha["continente"]?>" /><br/> <br/>
		   <input type="hidden" name="id_pais" value="<?=$_GET["id_pais"];?>" />
		   <input type="submit" value="Alterar"/>
		   </div>
		</form>
	</body>
</html>