<?php
	include "conexao.php";
	$update ="UPDATE pais SET nome_pais='" . $_POST["nome_pais"] . "', id_pais='" . $_POST["id_pais"] . "', continente='" . $_POST["continente"] . "' WHERE id_pais =".$_POST["id_pais"];
	$resultado = mysqli_query($link,$update) or die (mysqli_error($link));
	$linha = mysqli_fetch_array($resultado);
	header("location:listagem_pais.php");
?>

