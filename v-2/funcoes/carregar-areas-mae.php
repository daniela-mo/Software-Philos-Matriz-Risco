<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];
?>

<select class="form-control" name="cad-codigo-area-mae" id="cad-codigo-area-mae"  >
				<?php
					mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');
		
				
			$selecao2=mysqli_query($conexao,"select * from areas WHERE codigo_area_mae='0' and codigo_empresa='$codigo'");	
			$numero=mysqli_num_rows($selecao2);	
			if($numero==0){?>
				<option value="0">Área Principal/Raiz</option>
				
			<?php }else{	
			$selecao=mysqli_query($conexao,"select * from areas WHERE codigo_empresa='$codigo' order by area ASC");	
			while($registros=mysqli_fetch_array($selecao)){
				?>
				
				<option value="<?php echo $registros['id'] ?>"><?php echo $registros['area'] ?></option>
				
				
				<?php } }?>
				
			</select>