<?php session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php'); ?>
		<div class="col-md-4">
			<label>Grupo 
				<a class="pointer" onClick="AddGrupo()">+</a> 
				<a class="pointer" onClick="RemoveGrupo()">-</a>
			</label> 
			
			
			<select class="form-control" id="cad-grupo" name="cad-grupo" onChange="AtualizarPermissoes()">
			<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao=mysqli_query($conexao,"select * from grupos ");
			while($registros=mysqli_fetch_array($selecao)){
				?>
				
				<option value="<?php echo $registros['id'] ?>"><?php echo $registros['grupo'] ?></option>
				
				
				<?php } ?>
			</select>
			
			
			
		</div>
		
		
		<div class="col-md-4">
			<label>Menu</label>
				<select class="form-control" name="cad-menu" id="cad-menu"  onChange="AtualizarPermissoes()">
				<option value="0">Escolher</option>	
					<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');
			$selecao=mysqli_query($conexao,"select * from areas_menus ");
			while($registros=mysqli_fetch_array($selecao)){
				?>
					
			<option value="<?php echo $registros['id'] ?>"><?php echo $registros['menu'] ?> >> <?php echo $registros['submenu'] ?></option>		
			<?php } ?>		
				</select>
		</div>