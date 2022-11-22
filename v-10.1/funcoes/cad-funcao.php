<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$setor=$_POST['setor'];

	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao_areas=mysqli_query($conexao,"select * from areas WHERE codigo_area_mae='$setor'");
				while($registros_areas=mysqli_fetch_array($selecao_areas)){
			?>
				<option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?></option>
				
				<?php } ?>