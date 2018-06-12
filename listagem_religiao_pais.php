<!DOCTYPE html>
<html>
	<?php
		include "menu.inc";
	?>
	<head>
		<title>Listagem de Países e Religiões</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<div>
			<table border="1">
				<tr>
					<th>Nome País</th>
					<th>Nome Religião</th>
					<th>Ação</th>
				</tr>
				<?php
					include ("conexao.php");
					
					echo"<form method='POST' action='listagem_religiao_pais.php'>
		
				<label>Filtrar País ou Religião que comece com: </label>
				<input type='text' name='filtro'>
				<input type='submit' value='Enviar'/>
				<input type='reset' value='Apagar'/>

				
				</form>
				<p>
				 <form name = 'ordenar' method = 'post' action ='listagem_religiao_pais.php'> 
				 <select name = 'ordenacao' onchange = 'document.ordenar.submit()'>
					<option>::Ordenar por::</option>
					
					<option value = 'nome_religiao_pais_a_z'>nome_religiao_pais [A->Z]</option>
					<option value = 'nome_religiao_pais_z_a'>nome_religiao_pais[Z->A]</option>
					<option value = 'nome_pais_z_a'>nome_pais [A->Z]</option>
					<option value = 'nome_pais_z_a'>nome_pais [Z->A]</option>
				</select>
				<p>	
				</form>

		  ";
		  
		  
		  
			if(isset($_POST["filtro"])){
					$select = "SELECT * FROM info_pais_religiao WHERE
						nome_religiao like '%$_POST[filtro]%' or nome_pais like '%$_POST[filtro]%'";	
				}
			else{
					$select = "SELECT * FROM info_pais_religiao";
				}
				
			session_start();
				
			if(isset($_POST["ordenacao"]) || isset($_SESSION["ordenacao"])){
					
				if(isset($_POST["ordenacao"])){
						$_SESSION["ordenacao"] = $_POST["ordenacao"];
					}	
					
				switch($_SESSION["ordenacao"]){
						
						case "nome_pais_a_z";
						$select.= " ORDER BY nome_pais";
						break;
						
					case "nome_pais_z_a";
					   $select.= " ORDER BY nome_pais DESC";
						break;
						
					case "nome_religiao_a_z";
						$select.= " ORDER BY nome_religiao_pais ";
						break;
						
					case "nome_religiao_pais_z_a";
					   $select.= "ORDER BY nome_religiao_pais DESC";
						break;
					}				
				}
				

					$resultado = mysqli_query($link,$select)or die (mysqli_error($link));
					
					while ($tupla = mysqli_fetch_array($resultado)){
						$id_religiao_pais=$tupla["id_religiao_pais"];
						echo "<tr>
								<td>".$tupla["nome_pais"]."</td>
								<td>".$tupla["nome_religiao"]."</td>
								<td> <a href='alterar_pais_religiao.php?id_religiao_pais=$id_religiao_pais'>Alterar/</a>
								<a href='remover_pais_religiao.php?id_religiao_pais=$id_religiao_pais'>Remover</a> </td>
							</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>