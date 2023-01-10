<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
	@$codigo=$_POST['codigo'];

if($codigo==''){
	$codigo='0';
}
?>


<select class="form-control mb-4" name="cad-area">
	
		<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao_processos=mysqli_query($conexao,"select * from processos WHERE id='$codigo'");
			while($registros_processos=mysqli_fetch_array($selecao_processos)){
		?>
		
		<option><?php echo $registros_processos['area'] ?></option>
		
		<?php } ?>
		</select>