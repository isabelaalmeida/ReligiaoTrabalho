<!DOCTYPE html>
<html>
	<?php
		include "menu.inc";
	?>
	<head>
		<title>Listagem de Países</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>

	</head>
	<body>
		<div class="pais">
			<table border="1">
				<tr>
					<th>Nome do País</th>
					<th>Continente</th>
					<th>Ação</th>
				</tr>
								
			<form method='POST' action='listagem_pais.php'>
		
			<label>Filtrar País que comece com: </label>
			<input type = 'text' name = 'filtro'>
			
			<input type='submit' value='Enviar'/>
			<input type='reset' value='Apagar'/>
			
			</form>
			<p>
			 <form name = 'ordenar' method = 'post' action ='listagem_pais.php'> 
			 <select name = 'ordenacao' onchange = 'document.ordenar.submit()'>
				<option>Ordenar por:</option>
				
				<option value = 'nome_a_z'>Nome país [A->Z]</option>
				<option value = 'nome_z_a'>Nome país [Z->A]</option>
				<option value = 'continente_a_z'>continente[A->Z]</option>
				<option value = 'continente_z_a'>continente [Z->A]</option>
			</select>
			</p>	
			</form>

		 <?php
		  
		  if(isset($_POST["filtro"])){
			$select = "SELECT * FROM pais where nome_pais like '%$_POST[filtro]%'";	
		}
		else{
			$select = "SELECT * FROM pais nome_pais";
		}
		
		session_start();
		
		if(isset($_POST["ordenacao"]) || isset($_SESSION["ordenacao"])){
			
			if(isset($_POST["ordenacao"])){
				$_SESSION["ordenacao"] = $_POST["ordenacao"];
			}	
			
			switch($_SESSION["ordenacao"]){
				
				
				case "nome_a_z";
					$select.= " ORDER BY nome_pais";
					break;
				
				case "nome_z_a";
					$select.= " ORDER BY nome_pais DESC";
					break;
					
				
				case "continente_a_z";
					$select.= " ORDER BY continente";
					break;
				
				case "continente_z_a";
					$select.= " ORDER BY continente DESC";
					break;
			}				
		}	
				
					include ("conexao.php");
					
					
					$resultado = mysqli_query($link,$select)or die (mysqli_error($link));
					
					while ($tupla = mysqli_fetch_array($resultado)){
						$id = $tupla["id_pais"];
						echo "<tr>
								<td>" .$tupla["nome_pais"]. "</td>
								<td>" .$tupla["continente"]. "</td>
								<td> <a href='alterar_pais.php?id_pais=$id'>Alterar/</a>
								<a href='remover_pais.php?id_pais=$id'>Remover</a> </td>
							</tr>";
							
					}
				?>
			</table>
		</div>
	</body>
</html>