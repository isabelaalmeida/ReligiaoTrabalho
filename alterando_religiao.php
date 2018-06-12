<?php
	include "conexao.php";
	
	$simbolo = $_FILES["simb"];
	
	if($simbolo != NULL) { 
				$extensao = substr($simbolo["name"],-4);
				$nomeFinal = "simbolos/" . time().$extensao;
				if (move_uploaded_file($simbolo['tmp_name'], $nomeFinal)) {
 
					$update ="UPDATE religiao SET nome_religiao='" . $_POST["nome_religiao"] . 
					"', simbolo='" . $nomeFinal . 
					"' WHERE id_religiao =".$_POST["id_religiao"];
					$resultado = mysqli_query($link,$update) or die (mysqli_error($link));
					$linha = mysqli_fetch_array($resultado);
					header("location:listagem_religiao.php");
				}
				else { 
				$update ="UPDATE religiao SET nome_religiao='" . $_POST["nome_religiao"] . 
					"' WHERE id_religiao =".$_POST["id_religiao"];
					$resultado = mysqli_query($link,$update) or die (mysqli_error($link));
					$linha = mysqli_fetch_array($resultado);
					header("location:listagem_religiao.php");
			} 
			} 
			
	
?>

