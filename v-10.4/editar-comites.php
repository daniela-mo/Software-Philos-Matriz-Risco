<?php  
$nav_menu_principal='gestaoderisco';
$nav_menu_pagina='monitoramento';

session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
	
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


$selecao=mysqli_query($conexao,"select * from comites WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);
?>

	
		
<div class="row ml-4 mr-4 mt-4">		
	
	<div class="col-md-6">
		<label>Nome do Comitê</label>
		<input type="text" class="form-control" name="edit-comite" id="edit-comite" value="<?php echo $registros['nome'] ?>"  autocomplete="off">
	</div>
	
	<div class="col-md-6">
		<label>Descrição/Objetivo</label>
		<input type="text" class="form-control" name="edit-descricao" id="edit-descricao" value="<?php echo $registros['descricao'] ?>" autocomplete="off" >
	</div>
	
		
	
	
	

	<div class="col-md-12 mt-3 mb-5">
		<input type="button" class="btn btn-primary" value="Atualizar Comitê" onClick="AtualizarComite(<?php echo $registros['id'] ?>)">
	</div>
	

	
	
	
</div>				
					
				