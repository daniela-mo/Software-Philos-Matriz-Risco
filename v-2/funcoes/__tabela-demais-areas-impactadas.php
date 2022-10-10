
<?php 

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	
?>
<table class="table table-striped">
				
				<tr>
					<th>sim/não</th>
					<th>Área</th>
					<th>Empresa</th>
				</tr>
				
			<?php
				$selecao2=mysqli_query($conexao,"select * from areas WHERE area !='$codigo'");
				while($registros2=mysqli_fetch_array($selecao2)){
				$codigo_empresa=$registros2['codigo_empresa'];	
					
				$selecao_empresa=mysqli_query($conexao,"select * from empresas WHERE id='$codigo_empresa'");
				$registros_empresa=mysqli_fetch_array($selecao_empresa);
					
					
			?>	
				
				
			<tr>
				<td><input type="checkbox" name="areas[]" value="<?php echo $registros2['id'] ?>" ></td>
				<td><?php echo $registros2['area'] ?></td>	
				<td><?php echo $registros_empresa['razao_social'] ?></td>
			</tr>	
				
				
			<?php } ?>	
				
				
				
			</table>