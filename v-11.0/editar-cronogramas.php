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


$selecao=mysqli_query($conexao,"select * from comites_cronogramas WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);
$tipo_reuniao=$registros['tipo_reuniao'];
?>

	
		
<div class="row ml-4 mr-4 mt-4 mb-4">
		  
			<div class="col-md-4 mb-4">
				<label>Tipo Reunião</label>
				<select class="form-control" name="edit-tipo-reuniao-cronograma" id="edit-tipo-reuniao-cronograma">
					<?php if($tipo_reuniao!='Ordinária'){ ?>
					<option>Ordinária</option>
					<?php } ?>
					
					<?php if($tipo_reuniao!='Extraordinária'){ ?>
					<option>Extraordinária</option>
					<?php } ?>
				</select>
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Data Prevista</label>
				<input type="text" class="form-control datepicker" name="edit-data-prevista-cronograma" id="edit-data-prevista-cronograma" 
					   value="<?php echo $registros['data_prevista'] ?>" autocomplete="off" >
			</div>
						
			
			<div class="col-md-4 mb-4">
				<label>Horário Previsto</label>
				<input type="time" class="form-control" name="edit-horario-previsto-cronograma" id="edit-horario-previsto-cronograma" value="<?php echo $registros['horario_previsto'] ?>" autocomplete="off" >
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Realizado em:</label>
				<input type="text" class="form-control datepicker" name="edit-realizado-em-cronograma" id="edit-realizado-em-cronograma" value="<?php echo $registros['realizado_em'] ?>" autocomplete="off" >
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Horário Realizado</label>
				<input type="time" class="form-control" name="edit-horario-realizado-cronograma" id="edit-horario-realizado-cronograma" 
					   value="<?php echo $registros['horario_realizado'] ?>" autocomplete="off">
			</div>
			
			<div class="col-md-4 mb-4">
				<label>Duração</label>
				<input type="time" class="form-control" name="edit-duracao-cronograma" id="edit-duracao-cronograma" value="<?php echo $registros['duracao'] ?>" autocomplete="off" >
			</div>
			
			
			
			<div class="col-md-12">
				<input type="button" class="btn btn-primary" value="Atualizar Cronograma" onClick="AtualizarCronograma(<?php echo $registros['id'] ?>)">
			</div>
		  
		 </div>
				