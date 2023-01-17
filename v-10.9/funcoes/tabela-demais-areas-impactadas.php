
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

<style>
	tr td{font-size: 13px}

</style>


<div class="row">
	

	
	<div class="col-md-6 mb-5">
<table class="table table-striped">
				
				<tr>
					<th>sim/não</th>
					<th>Área</th>
					<th>Empresa</th>
				</tr>
				
			<?php
	
	
				$selecao2=mysqli_query($conexao,"select * from areas WHERE area !='$codigo' ");
	$numero=mysqli_num_rows($selecao2);	
	
	$numero2=$numero/2;
	
	
		$selecao2=mysqli_query($conexao,"select * from areas  WHERE area !='$codigo' order by area ASC limit 0,$numero2  ");
	$numero=mysqli_num_rows($selecao2);	
	
	
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
	</div>
	
	
	
	<div class="col-md-6 mb-5">
<table class="table table-striped">
				
				<tr>
					<th>sim/não</th>
					<th>Área</th>
					<th>Empresa</th>
				</tr>
				
			<?php
	
	
				$selecao2=mysqli_query($conexao,"select * from areas WHERE area !='$codigo' ");
	$numero=mysqli_num_rows($selecao2);	
	
	$numero2=$numero/2;
	
	
		$selecao2=mysqli_query($conexao,"select * from areas WHERE area !='$codigo' order by area ASC limit $numero2,$numero");
	$numero=mysqli_num_rows($selecao2);	
	
	
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
	</div>
	
	
	
	
</div>
