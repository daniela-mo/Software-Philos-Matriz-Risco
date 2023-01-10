<?php	
session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

$codigo=$_POST['codigo'];
$codigo_area=$_POST['area_principal'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
?>



<select class="form-control" name="cad-area" id="cad-area" onChange="MudarSetor()">
	<?php

				$selecao_areas1=mysqli_query($conexao,"select * from areas WHERE id='$codigo_area'");
				$registros_areas1=mysqli_fetch_array($selecao_areas1);
			$nome_area=$registros_areas1['area'];
			if($nome_area==''){$nome_area='Em Transição';}
			?>
	
	<option value="<?php echo $registros_areas1['id'] ?>"><?php echo $nome_area  ?></option>
	
				<?php

				$selecao_areas=mysqli_query($conexao,"select * from areas WHERE codigo_empresa='$codigo'");
				while($registros_areas=mysqli_fetch_array($selecao_areas)){
			?>
	
	<?php
	if($registros_areas1['id']!=$registros_areas['id']){
	?>
				<option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?></option>
				
				<?php }} ?>
			</select>