<!DOCTYPE html>
<html>
	<?php
		include "menu.inc";
	?>
	<head>
		<title>Listagem de Religiões</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<div class="listagem">
			<table border="1">
				<tr>
					<th>Nome da Religião</th>
					<th>Símbolo</th>
					<th>Ação</th>
				</tr>
				
				<form method='POST' action='listagem_religiao.php'>
		
				<label>Filtrar Religião que comece com: </label>
				<input type = 'text' name = 'filtro'>
				
				<input type='submit' value='Enviar'/>
				<input type='reset' value='Apagar'/>
				
				</form>
				<p>
				 <form name = 'ordenar' method = 'post' action ='listagem_religiao.php'> 
				 <select name = 'ordenacao' onchange = 'document.ordenar.submit()'>
					<option>::Ordenar por::</option>
					
					<option value = 'nome_religiao_a_z'>nome_religiao  [A->Z]</option>
					<option value = 'nome_religiao_z_a'>nome_religiao  [Z->A]</option>
				</select>
				</p>	
				</form>

		 <?php
		$select = "SELECT * FROM religiao";	
		if(isset($_POST["filtro"])){
			$select .= " WHERE nome_religiao like '%$_POST[filtro]%'";	
		}
		
		session_start();
		
		if(isset($_POST["ordenacao"]) || isset($_SESSION["ordenacao"])){
			
			if(isset($_POST["ordenacao"])){
				$_SESSION["ordenacao"] = $_POST["ordenacao"];
			}	
			
			switch($_SESSION["ordenacao"]){
				
				case "nome_religiao_z_a";
					$select.= " ORDER BY nome_religiao";
					break;
					
				case "nome_religiao_a_z";
					$select.= " ORDER BY nome_religiao DESC";
					break;
				
			}				
		}
				
					include ("conexao.php");
					
					
					
					$resultado = mysqli_query($link,$select)or die ($select);
					
					while ($tupla = mysqli_fetch_array($resultado)){
						$id = $tupla["id_religiao"];
						echo "<tr>
								<td>" .$tupla["nome_religiao"]. "</td>
								<td><img src='" .$tupla["simbolo"]."' width='100px' height='100px' /></td>
								<td> <a href='alterar_religiao.php?id_religiao=$id'>Alterar/</a>
								<a href='remover_religiao.php?id_religiao=$id'>Remover</a> </td>
							</tr>";
						
					}
					
					
				?>
				</div>
			</table>
		</div>
	</body>
</html>