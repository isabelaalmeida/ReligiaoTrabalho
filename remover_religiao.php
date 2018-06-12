<!DOCTYPE html>
<html>
	<head>
		<title>Remoção de Religião</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<?php
			include ("conexao.php");
			$numero = $_GET["id_religiao"];
			
			$delete ="DELETE FROM religiao WHERE id_religiao=$numero";

			if(mysqli_query($link,$delete)){
					header("location:listagem_religiao.php");
			}
			else{
				echo"Ocorreu um erro";
			}
		?>
	</body>
</html>