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


$selecao=mysqli_query($conexao,"select * from comites_atas WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);

$tipo=$registros['tipo'];
?>

	
		
<div class="row ml-4 mr-4 mt-4 mb-4">
		  
			<div class="col-md-6 mb-4">
				<label>Nome</label>
				<input type="text" class="form-control" name="edit-nome-ata" id="edit-nome-ata" autocomplete="off" value="<?php echo $registros['nome'] ?>" >
			</div>
			
			<div class="col-md-6 mb-4">
				<label>Tipo de Reunião</label>
				<select class="form-control" name="edit-tipo-reuniao" id="edit-tipo-reuniao">
					
					<option><?php echo $tipo ?> </option>
					
					<?php if($tipo!='Ordinária - cronograma anual'){ ?>
					<option>Ordinária - cronograma anual </option>
					<?php } ?>
					<?php if($tipo!='Extraordinária - caracter emergencial'){ ?>
					<option>Extraordinária - caracter emergencial</option>
					<?php } ?>
				</select>
				
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Data</label>
				<input type="text" class="form-control datepicker" name="edit-data" id="edit-data" autocomplete="off" value="<?php echo $registros['data'] ?>" >
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Hora Inicio</label>
				<input type="time" class="form-control" name="edit-inicio" id="edit-inicio" autocomplete="off" value="<?php echo $registros['inicio'] ?>">
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Hora Termino</label>
				<input type="time" class="form-control" name="edit-termino" id="edit-termino" autocomplete="off" value="<?php echo $registros['termino'] ?>">
			</div>
			
			<div class="col-md-12">
				<input type="button" class="btn btn-primary" value="Atualizar Ata" onClick="AtualizarAta(<?php echo $registros['id'] ?>)">
			</div>
		  
		 </div>		
				