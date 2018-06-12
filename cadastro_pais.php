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
			include ("conexao.php");
			
			$nome_pais = $_POST["nome_pais"];
			$continente = $_POST["continente"];

			$insert ="INSERT INTO pais (nome_pais,continente)
					VALUES ('$nome_pais','$continente')";
			if(mysqli_query($link, $insert)){
				echo"País cadastrado com sucesso";
			}else{
				echo "Erro ao cadastrar<br/>";
				echo mysqli_error($link);
			}
		?>
	</body>
</html>