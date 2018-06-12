<!DOCTYPE html>
<html>
	<head>
		<title>Alteração Religião</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
	<?php

	include "menu.inc";
	include "conexao.php";
	$sql ="select * from religiao WHERE id_religiao =".$_GET["id_religiao"];

	$resultado = mysqli_query($link,$sql) or die (mysqli_error($link));

	$linha = mysqli_fetch_array($resultado);

	$cod_religiao=$linha["id_religiao"];
	?> 
		<form method="POST"  action="alterando_religiao.php" enctype="multipart/form-data">
			<label>Nome Religião:</label>
			<input type="text" name="nome_religiao" value="<?=$linha["nome_religiao"]?>" />
			<br/> <br/>
			<label>Símbolo:</label>
			<img src="<?=$linha["simbolo"]?>" width="100px" height="100px"/>
			<input type="file" name="simb" />
		   <input type="hidden" name="id_religiao" value="<?=$_GET["id_religiao"];?>" />
		   <input type="submit" value="Alterar"/>
		</form>
	</body>
</html>