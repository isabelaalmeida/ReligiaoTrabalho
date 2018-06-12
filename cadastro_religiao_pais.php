<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Relação Religião e País </title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>

	</head>
	<body>
		<?php
			include "menu.inc";
			include ("conexao.php");
			$id_religiao = $_POST["cod_religiao"];
			$id_pais = $_POST["cod_pais"];
			$insert ="INSERT INTO religiao_pais (cod_pais,cod_religiao)
					VALUES ('$id_pais','$id_religiao')";
			if(mysqli_query($link, $insert)){
				echo"País e Religião cadastrados com sucesso";
			}else{
				echo "Erro ao cadastrar<br/>";
				echo mysqli_error($link);
			}
		?>
	</body>
</html>