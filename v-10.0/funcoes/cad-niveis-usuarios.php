
<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$menu=$_POST['menu'];
$grupo=$_POST['grupo'];

if($menu==0){

echo "Você precisa selecionar um Menu";	
	
}else{

?>

			<table class="table table-striped">
				<tr>
					<th>Setor</th>
					<th>Consultar</th>
					<th>Editar</th>
					<th>Excluir</th>
					<th>Admin</th>
				</tr>
				


				
				
<?php
	            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
	$selecao=mysqli_query($conexao,"select * from grupos_permissoes WHERE setor='$menu' and grupo='$grupo'");
	$numero=mysqli_num_rows($selecao);
	if($numero>0){			
				
	while($registros=mysqli_fetch_array($selecao)){	
	$consultar=$registros['consultar'];
	$editar=$registros['editar'];
	$excluir=$registros['excluir'];	
	$admin=$registros['admin'];	
	$setor=$registros['setor'];	
		
?>				
				<tr>
					<td><?php 
		mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');	
	$selecao_todas_areas=mysqli_query($conexao,"select * from areas_menus WHERE id='$setor' ");
	$registros_todas_areas=mysqli_fetch_array($selecao_todas_areas)	
		
						?><?php echo $registros_todas_areas['submenu'] ?></td>
					<td><input type="checkbox" name="cad-consultar" id="cad-consultar" <?php if($consultar=='1'){ ?> checked <?php } ?> ></td>
					<td><input type="checkbox" name="cad-editar" id="cad-editar" <?php if($editar=='1'){ ?> checked <?php } ?>  ></td>
					<td><input type="checkbox" name="cad-excluir" id="cad-excluir" <?php if($excluir=='1'){ ?> checked <?php } ?>  ></td>
					<td><input type="checkbox" name="cad-admin" id="cad-admin" <?php if($admin=='1'){ ?> checked <?php } ?>  ></td>
				</tr>
			<?php } ?>
				
</table>			
		
<input type="button" class="btn btn-primary" value="Gravar" onClick="GravarNiveis()">
				
	<?php }else{ ?>			

				
	<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
			mysqli_query($conexao,'SET character_set_connection=utf8');
			mysqli_query($conexao,'SET character_set_client=utf8');
			mysqli_query($conexao,'SET character_set_results=utf8');	
	$selecao_todas_areas=mysqli_query($conexao,"select * from areas_menus WHERE id='$menu' ");
	while($registros_todas_areas=mysqli_fetch_array($selecao_todas_areas)){
	?>			<tr>
					<td><?php echo $registros_todas_areas['submenu'] ?> </td>
					<td><input type="checkbox" name="cad-consultar" id="cad-consultar" ></td>
					<td><input type="checkbox" name="cad-editar" id="cad-editar"  ></td>
					<td><input type="checkbox" name="cad-excluir" id="cad-excluir"   ></td>
					<td><input type="checkbox" name="cad-admin" id="cad-admin"  ></td>
				</tr>			
	<?php } ?>			
				
				
				
			
			</table>	


<input type="button" class="btn btn-primary" value="Gravar" onClick="GravarNiveis()">

<?php }} ?>
	