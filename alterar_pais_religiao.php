<!DOCTYPE html>
<html>
	<head>
		<title>Alteração País e Religião</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
	<?php

	include "menu.inc";
	include "conexao.php";
	$sql ="select * from religiao_pais WHERE id_religiao_pais =".$_GET["id_religiao_pais"];

	$resultado = mysqli_query($link,$sql) or die (mysqli_error($link));

	$linha = mysqli_fetch_array($resultado);

	$cod_pais=$linha["cod_pais"];
	$cod_religiao=$linha["cod_religiao"];
	?> 
		<form method="POST"  action="alterando_pais_religiao.php">
			<label>Nome País:</label>
			<select name="nome_pais_altera">
			<?php
				$sql="SELECT * FROM pais ORDER BY nome_pais";
				$resultado= mysqli_query($link,$sql);
				while($linha=mysqli_fetch_array($resultado)){
					$id_pais=$linha["id_pais"];
					$nome_pais=$linha["nome_pais"];
					if($id_pais==$cod_pais){
						$selected ="selected";
					}
					else{
						$selected ="";
					}
					echo "<option value='$id_pais' $selected>$nome_pais</option>";
				}
		   ?>
			</select>
			<br/> <br/>
			<label>Nome Religião:</label>
			<select name="nome_religiao_altera">
			<?php
				$sql="SELECT * FROM religiao ORDER BY nome_religiao";
				$resultado= mysqli_query($link,$sql);
				while($linha=mysqli_fetch_array($resultado)){
					$id_religiao=$linha["id_religiao"];
					$nome_religiao=$linha["nome_religiao"];
					if($id_religiao==$cod_religiao){
						$selected ="selected";
					}
					else{
						$selected ="";
					}
					echo "<option value='$id_religiao' $selected>$nome_religiao</option>";
				}
		   ?>
			</select>
		   
		   <input type="hidden" name="id_religiao_pais" value="<?=$_GET["id_religiao_pais"];?>" />
		   <input type="submit" value="Alterar"/>
		</form>
	</body>
</html>