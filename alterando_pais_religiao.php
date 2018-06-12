<?php
	include "conexao.php";
	$update ="UPDATE religiao_pais SET cod_pais='" . 
	$_POST["nome_pais_altera"] . "', cod_religiao='" . 
	$_POST["nome_religiao_altera"] . "' WHERE id_religiao_pais =".$_POST["id_religiao_pais"];
	$resultado = mysqli_query($link,$update) or die (mysqli_error($link));
	$linha = mysqli_fetch_array($resultado);
	header("location:listagem_religiao_pais.php");
?>

