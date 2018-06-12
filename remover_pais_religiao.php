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
			$numero = $_GET["id_religiao_pais"];
			
			$delete ="DELETE FROM religiao_pais WHERE id_religiao_pais=$numero";

			if(mysqli_query($link,$delete)){
					header("location:listagem_religiao_pais.php");
			}
			else{
				echo"Ocorreu um erro";
			}
		?>
	</body>
</html>