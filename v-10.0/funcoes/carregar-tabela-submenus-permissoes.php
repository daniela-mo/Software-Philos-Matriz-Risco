<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$codigo_grupo=$_POST['codigo_grupo'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
?>

<input type="hidden" id="obter-codigo-permissoes" name="obter-codigo-permissoes" value="<?php echo $codigo; ?>">

<table class="table">
				<tr>
					<th>Menu</th>
					<th>Visualizar</th>
					<th>Cadastrar</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
	
	<?php
			$selecao_submenus=mysqli_query($conexao,"select * from estrutura_de_menus WHERE id='$codigo' ");
			while($registros_submenus=mysqli_fetch_array($selecao_submenus)){
			$codigo_raiz=$registros_submenus['id'];	
				
			$selecao_preenchimentos=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='$codigo_raiz' and codigo_grupo='$codigo_grupo'");
			$registros_preenchimento=mysqli_fetch_array($selecao_preenchimentos);	
		?>
				<tr>
					<td><?php echo $registros_submenus['menu'] ?>(Módulo)</td>
					<td><input type="checkbox" name="raiz_ler" id="raiz_ler" <?php if($registros_preenchimento['ler']=='1'){?> checked <?php } ?> ></td>
					
					
					<td></td>
					<td></td>
				</tr>
			<?php } ?>
				
				<?php
			$selecao_submenus=mysqli_query($conexao,"select * from estrutura_de_menus WHERE codigo_menu_mae='$codigo' and tipo='default' ");
			while($registros_submenus=mysqli_fetch_array($selecao_submenus)){	
			$codigo_sub=$registros_submenus['id'];	
				
		$selecao_preenchimentos2=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='$codigo_sub' and codigo_grupo='$codigo_grupo'");
		$registros_preenchimento2=mysqli_fetch_array($selecao_preenchimentos2);			
		$codigo_menu=$registros_submenus['id'];	
		?>
				<tr>
					<td>&rarr;<span style="margin-left: 15px"></span><?php echo $registros_submenus['menu'] ?></td>
					<td><input type="checkbox" id="ler_<?php echo $registros_submenus['id'] ?>" name="ler_<?php echo $registros_submenus['id'] ?>" <?php if($registros_preenchimento2['ler']=='1'){?> checked <?php } ?>></td>
					
					<td><input type="checkbox" id="cadastrar_<?php echo $registros_submenus['id'] ?>" name="cadastrar_<?php echo $registros_submenus['id'] ?>" <?php if($registros_preenchimento2['cadastrar']=='1'){?> checked <?php } ?>></td>
					
					<td><input type="checkbox" id="editar_<?php echo $registros_submenus['id'] ?>" name="editar_<?php echo $registros_submenus['id'] ?>" <?php if($registros_preenchimento2['editar']=='1'){?> checked <?php } ?>></td>
					
					<td><input type="checkbox" id="excluir_<?php echo $registros_submenus['id'] ?>" name="excluir_<?php echo $registros_submenus['id'] ?>" <?php if($registros_preenchimento2['excluir']=='1'){?> checked <?php } ?>></td>
				</tr>
	
			<?php
				$selecao_abas=mysqli_query($conexao,"select * from estrutura_de_menus WHERE codigo_menu_mae='$codigo' and tipo ='aba' and codigo_menu_superior='$codigo_menu'");
				while($registros_abas=mysqli_fetch_array($selecao_abas)){
				$codigo_sub2=$registros_abas['id'];	
					
				$selecao_preenchimentos3=mysqli_query($conexao,"select * from grupos_permissoes WHERE codigo_menu='$codigo_sub2' and codigo_grupo='$codigo_grupo'");
		$registros_preenchimento3=mysqli_fetch_array($selecao_preenchimentos3);		
					
					
			?>	
		
		<tr>
					<td><span style="margin-left: 30px">&rarr; </span><?php echo $registros_abas['menu'] ?></td>
					<td><input type="checkbox" id="ler_<?php echo $registros_abas['id'] ?>" name="ler_<?php echo $registros_abas['id'] ?>" <?php if($registros_preenchimento3['ler']=='1'){?> checked <?php } ?>></td>
					
					<td><input type="checkbox" id="cadastrar_<?php echo $registros_abas['id'] ?>" name="cadastrar_<?php echo $registros_abas['id'] ?>" <?php if($registros_preenchimento3['cadastrar']=='1'){?> checked <?php } ?>></td>
					
					<td><input type="checkbox" id="editar_<?php echo $registros_abas['id'] ?>" name="editar_<?php echo $registros_abas['id'] ?>" <?php if($registros_preenchimento3['editar']=='1'){?> checked <?php } ?>></td>
					
					<td><input type="checkbox" id="excluir_<?php echo $registros_abas['id'] ?>" name="excluir_<?php echo $registros_abas['id'] ?>" <?php if($registros_preenchimento3['excluir']=='1'){?> checked <?php } ?>></td>
				</tr>
	
	
			<?php }} ?>
			</table>



<div class="row">
	<div class="col-md-12 mt-5">
		<input type="submit" value="Atualizar Permissões" class="btn btn-primary float-right" onClick="AtualizarPermissoes(<?php echo $codigo ?>)">
	
	</div>
</div>