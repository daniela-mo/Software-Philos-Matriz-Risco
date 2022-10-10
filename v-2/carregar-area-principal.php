<?php	
session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

$codigo=$_POST['codigo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
?>



<select class="form-control" name="cad-area" id="cad-area" onChange="MudarSetor()">
				<option value="0">Escolher Área</option>
				<?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao_areas=mysqli_query($conexao,"select * from areas WHERE codigo_empresa='$codigo'");
				while($registros_areas=mysqli_fetch_array($selecao_areas)){
			?>
				<option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?></option>
				
				<?php } ?>
			</select>