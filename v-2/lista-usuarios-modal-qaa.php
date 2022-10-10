
<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
$codigo_qaa=$_POST['qaa'];
?>


<table class="table table-striped">
		  
		<tr >
			<th>Usuários</th>
			<th>Cargo</th>
		</tr>	  
			  
			  
		  <?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao_responsaveis_qaa=mysqli_query($conexao,"select * from responsaveis_qaa WHERE codigo_qaa='$codigo_qaa' ");
	   		while($registros=mysqli_fetch_array($selecao_responsaveis_qaa)){
			$codigo_usuario=$registros['codigo_usuario'];
				
		  ?>
			  
			<tr>
			 	<td><?php echo $registros['usuario'] ?></td>
				<td>
					<?php 
					$selecao1=mysqli_query($conexao,"select * from usuarios_empresa WHERE id='$codigo_usuario'");
				$registros1=mysqli_fetch_array($selecao1);
			  		?>
			  
					<?php echo $registros1['cargo'] ?>
				
				</td> 
			 </tr>  
		  
		  
		  
		  
		  <?php 
			}
			?>	
		  </table>