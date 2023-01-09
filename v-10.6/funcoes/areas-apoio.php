<?php 

session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
?>

<?php
$id_usuario=$_POST['id_usuario'];

?>


			<label>Áreas de apoio <a onClick="AddArea()" id="add-area12">+</a></label>
			
			
			<select class="cad-area-apoio mb-3" id="cad-area-apoio">	
			<?php
				mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao2=mysqli_query($conexao,"select * from areas order by area ASC");
				while($registros2=mysqli_fetch_array($selecao2)){
				$codigo_empresa=$registros2['codigo_empresa'];	
					
				$selecao_empresa=mysqli_query($conexao,"select * from empresas WHERE id='$codigo_empresa'");	
				$registros_empresa=mysqli_fetch_array($selecao_empresa);	
					
					
			?>	
			
			<?php if($registros2['area']!=''){ ?>	
			<option value="<?php echo $registros2['id'] ?>"><?php echo $registros2['area'] ?> (<?php echo $registros_empresa['razao_social'] ?>)</option>
			
			<?php }} ?>
				
				
			</select>
			
			
			<input type="button" value="gravar" class="mb-3 cad-area-apoio" onClick="GravarArea()" >
			
		<table id="example" class="display table table-striped mb-4" style="width:100%">
        <thead>
			<?php
			$selecao=mysqli_query($conexao,"select * from areas_apoio WHERE codigo_usuario='$id_usuario'");
			$numero=mysqli_num_rows($selecao);
			if($numero=='0'){
			?>
			
			<tr>
				<td>Sem Áreas de Apoio cadastradas</td>
			</tr>
			
			
			<?php } else{ ?>
			
            <tr>
                <th class="desativar1">Área</th>
				<th class="desativar1">Ação</th>
             
            </tr>
			
			<?php } ?>
			
        </thead>
        <tbody>
			<?php
			mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
				$selecao=mysqli_query($conexao,"select * from areas_apoio WHERE codigo_usuario='$id_usuario'");
			$numero=mysqli_num_rows($selecao);
				while($registros=mysqli_fetch_array($selecao)){
			?>
            <tr>
                <td><?php echo $registros['area'] ?></td>
                <td class="desativar1"><a onclick="DeletarAreaApoio(<?php echo $registros['id'] ?>)"><i class="fa fa-trash"></i></a></td>
             
              
              
				
            </tr>
			
			<?php } ?>

        </tbody>
       
    </table>
	