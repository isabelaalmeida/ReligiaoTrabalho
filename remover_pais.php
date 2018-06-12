<!DOCTYPE html>
<html>
	<head>
		<title>Remoção de País</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<?php
			include ("conexao.php");
			include "menu.inc";
			$numero = $_GET["id_pais"];
			
			$delete ="DELETE FROM pais WHERE id_pais=$numero";

			if(mysqli_query($link,$delete)){
					header("location:listagem_pais.php");
			}
			else{
				echo"Ocorreu um erro: Você não pode apagar este país, pois ele está relacionado a uma determinada religião.";
				echo "<br/>";
			}
		?>
	</body>
</html>