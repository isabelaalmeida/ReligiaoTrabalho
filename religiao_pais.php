<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<title>Cadastro de Religiões e Países</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<?php
			include "menu.inc";
		?>
		
		<h1>Relação País e Religião</h1>
		<div class="form">
		<form action="cadastro_religiao_pais.php" method="POST" enctype="multipart/form-data">
			<label>Nome da Religião:</label>
			<select name="cod_religiao">
				<?php
					include("conexao.php");
					$select = "SELECT * FROM religiao ORDER BY nome_religiao";
					$resultado = mysqli_query($link,$select) or die(mysqli_error($link));
					while($linha=mysqli_fetch_array($resultado)){
						echo "<option value='".$linha['id_religiao']."'>".$linha['nome_religiao']."</option>";
					}
				
				?>
			</select>
			<br/><br/>
			<label>Nome País:</label>
			<select name="cod_pais">
				<?php
					include("conexao.php");
					$select = "SELECT * FROM pais ORDER BY nome_pais";
					$resultado = mysqli_query($link,$select) or die(mysqli_error($link));
					while($linha=mysqli_fetch_array($resultado)){
						echo "<option value='".$linha['id_pais']."'>".$linha['nome_pais']."</option>";
					}
				?>
			</select>
			
			<br/>
			</div>
			
			<div class="botao">
			<br/><br/>
			<input type="submit" value="Enviar" />
			</div>
		</form>
	</body>
</html>