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
			$simbolo = $_FILES["simbolo"];
			$nome_religiao = $_POST["nome_religiao"];
			include ("conexao.php");
			
			if($simbolo != NULL) { 
				$extensao = substr($simbolo["name"],-4);
				$nomeFinal = "simbolos/" . time().$extensao;
				if (move_uploaded_file($simbolo['tmp_name'], $nomeFinal)) {
 
					$insert = "INSERT INTO religiao (nome_religiao,simbolo) VALUES ('$nome_religiao','$nomeFinal')";
					if(mysqli_query($link, $insert)){
						header("location:listagem_religiao.php");
					}else{
						echo "Erro ao cadastrar<br/>";
						echo mysqli_error($link);
					}
				}
			} 
			else { 
				echo"Você não realizou o upload de forma satisfatória."; 
			} 
		?>
	</body>
</html>