<?php
 
 header("Content-type: application/vnd.ms-excel");
 header("Content-type: application/force-download");
 header("Content-Disposition: attachment; filename=teste.xls");
 header("Pragma: no-cache");

?>

<style>
	.a2{background-color: #E4E4EB}
	td{min-height: 30px}
</style>

<meta charset='utf-8'>
 <table class="table table-striped">
				 	<tr>
						<th>ID</th>
						<th>PLANEJAMENTO</th>
						<th>INÍCIO</th>
						<th>TÉRMINO</th>
						<th>STATUS</th>
						<th>PERIODICIDADE</th>
							<th>ATIVIDADE(S)</th>
							<th>PRIORIDADE</th>
							<th>INÍCIO</th>
							<th>TÉRMINO</th>
							<th>ENVOLVIDO(S)</th>
							<th>STATUS</th>
							<th>PERIODICIDADE</th>
							<th>ÁREA</th>
								<th>MARCO(S)</th>
								<th>STATUS</th>
								<th>INÍCIO</th>
								<th>TÉRMINO</th>
								<th>PERÍODICIDADE</th>	
									<th>ATIVIDADE(S) MARCO</th>	
									<th>STATUS</th>		
									<th>INÍCIO</th>		
									<th>TÉRMINO</th>		
									<th>ENVOLVIDO(S)</th>		
									<th>PERÍODICIDADE</th>		
									<th>ÁREA</th>
									<th>MARCO(S)|TAREFA(S)</th>

					</tr>
				 



<?php
	 session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

	 	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	 
	  
	$min=$_REQUEST['min'];
	$ano_min= substr($min,6,10);
	$mes_min= substr($min,3,2);
	$dia_min= substr($min,0,2);
			
	@$data_min=$ano_min."-".$mes_min."-".$dia_min; 
	 
	 
	if($data_min=='--'){$data_min='1999-01-01';} 

	 
	$max=$_REQUEST['max']; 
	$ano_max= substr($max,6,10);
	$mes_max= substr($max,3,2);
	$dia_max= substr($max,0,2);
			
	@$data_max=$ano_max."-".$mes_max."-".$dia_max;  
	 
	if($data_max=='--'){$data_max='3000-01-01';}
	 
	 

$selecao=mysqli_query($conexao,"select * from workflow where data_inicio>='$data_min' and data_vencimento<='$data_max'");	
$var=1;	 
	 
while($registros=mysqli_fetch_array($selecao)){
	$codigo=$registros['id'];
	
	
	
	
if($var==3){$var=1;};	
?>


<tr class="a<? echo $var ?>">
						<td style="vertical-align: top"><?php echo $registros['id'] ?></td>
						<td style="vertical-align: top"><?php echo $registros['planejamento'] ?></td>
						<td style="vertical-align: top"><?php echo $registros['data_inicio'] ?></td>
						<td style="vertical-align: top"><?php echo $registros['data_vencimento'] ?></td>
						<td style="vertical-align: top"><?php echo $registros['status'] ?></td>
						<td style="vertical-align: top"><?php echo $registros['periodicidade'] ?></td>					
						
				
	
	
<td>
	<?php /////////////////////////////////////////Atividades////////////////////////////////////////
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='0'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['tarefa'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>
	
	
	<td>
	<?php /////////////////////////////////////////PRIORIDADE////////////////////////////////////////
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='0'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['prioridade'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>
	
	
	<td>
	<?php /////////////////////////////////////////Data Início////////////////////////////////////////
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='0'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['data_inicio'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>
	
	
	
	<td>
	<?php /////////////////////////////////////////Data Término////////////////////////////////////////
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='0'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['data_termino'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>
	
	
	
	
	<td>
	<?php /////////////////////////////////////////Envolvidos////////////////////////////////////////
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='0'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['envolvido'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>
	
	
	
	<td>
	<?php /////////////////////////////////////////Status////////////////////////////////////////
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='0'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['status'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>
	
	
	<td>
	<?php /////////////////////////////////////////Períodicidade////////////////////////////////////////
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='0'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['periodicidade'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>
	
	
	<td>
		<?php
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='0'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
		$area=$registros_atividades['area'];
		
	$selecao_area=mysqli_query($conexao,"select * from areas WHERE ID='$area'");
	$registros_area=mysqli_fetch_array($selecao_area);	
	?>
	
	
			<?php echo $registros_area['area'] ?>
			
	
	
	<?php } ?>
	
	</td>
	
	
<td>
	<?php /////////////////////////////////////////Marcos////////////////////////////////////////
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	?>
	<strong><?php echo $registros_fases['fase'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>
	
	
	
<td>
	<?php /////////////////////////////////////////Status////////////////////////////////////////
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	?>
	<strong><?php echo $registros_fases['status'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>	
	
	
<td>
	<?php /////////////////////////////////////////Data Início////////////////////////////////////////
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	?>
	<strong><?php echo $registros_fases['data_inicio'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>		
	
	
<td>
	<?php /////////////////////////////////////////Data Término////////////////////////////////////////
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	?>
	<strong><?php echo $registros_fases['data_termino'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>	
	
	
<td>
	<?php /////////////////////////////////////////Períodicidade////////////////////////////////////////
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	?>
	<strong><?php echo $registros_fases['periodicidade'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php } ?>
</td>		
	
	
	
		<td>
	<?php /////////////////////////////////////////ATIVIDADES MARCO////////////////////////////////////////
	
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	$codigo_fases=$registros_fases['id'];
	
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='$codigo_fases'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['tarefa'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php }} ?>
</td>	
	

	
<td>
	<?php /////////////////////////////////////////STATUS////////////////////////////////////////
	
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	$codigo_fases=$registros_fases['id'];
	
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='$codigo_fases'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['status'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php }} ?>
</td>		
	
	
	
	
<td>
	<?php /////////////////////////////////////////DATA INÍCIO////////////////////////////////////////
	
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	$codigo_fases=$registros_fases['id'];
	
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='$codigo_fases'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['data_inicio'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php }} ?>
</td>			
	
	
<td>
	<?php /////////////////////////////////////////DATA TÉRMINO////////////////////////////////////////
	
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	$codigo_fases=$registros_fases['id'];
	
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='$codigo_fases'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['data_termino'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php }} ?>
</td>	
	
	<td>
	<?php /////////////////////////////////////////ENVOLVIDO////////////////////////////////////////
	
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	$codigo_fases=$registros_fases['id'];
	
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='$codigo_fases'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['envolvido'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php }} ?>
</td>	
	
	<td>
	<?php /////////////////////////////////////////PERIODICIDADE////////////////////////////////////////
	
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	$codigo_fases=$registros_fases['id'];
	
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='$codigo_fases'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
	?>
	<strong><?php echo $registros_atividades['periodicidade'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php }} ?>
</td>
	
	
<td>
	
	<?php /////////////////////////////////////////PERIODICIDADE////////////////////////////////////////
	
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	$codigo_fases=$registros_fases['id'];
	
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='$codigo_fases'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
		$area=$registros_atividades['area'];
		
	$selecao_area=mysqli_query($conexao,"select * from areas WHERE ID='$area'");
	$registros_area=mysqli_fetch_array($selecao_area);		
		
		
	?>
	<strong><?php echo $registros_area['area'];echo "\n <br>"; echo "\n <br>";?></strong>
	
	<?php }} ?>
	
		
	
	</td>	
	
	
		<td>
	<?php /////////////////////////////////////////ATIVIDADES MARCO////////////////////////////////////////
	
	$selecao_fases=mysqli_query($conexao,"select * from fases_workflow WHERE codigo_planejamento='$codigo'");
	while($registros_fases=mysqli_fetch_array($selecao_fases)){
	$codigo_fases=$registros_fases['id'];
	
	$selecao_atividades=mysqli_query($conexao,"select * from atividades_planejamento_workflow WHERE codigo_planejamento='$codigo' and codigo_fase='$codigo_fases'");
	while($registros_atividades=mysqli_fetch_array($selecao_atividades)){
		$codigo_atividade=$registros_atividades['id'];?>
		
			
		
	<?php	
	$selecao_tarefas=mysqli_query($conexao,"select * from tarefas_atividades_workflow WHERE codigo_atividade='$codigo_atividade'");
	while($registros_tarefas=mysqli_fetch_array($selecao_tarefas)){	
		
		

	?>
			
	<strong>MARCO: <?php echo strtoupper($registros_atividades['tarefa']);echo "\n <br>" ?>		
	<strong> Tarefa: <?php echo $registros_tarefas['tarefa'];?> <?php echo "\n <br>"; ?>
		
		Status: <?php echo $registros_tarefas['status'];?>
		
		<?php echo "\n <br>"; ?></strong>
				
		Início|Término: <?php echo $registros_tarefas['data_inicio'];?> | <?php echo $registros_tarefas['data_termino'];?>
		
		<?php echo "\n <br>"; ?></strong>
			
				Envolvido: <?php echo $registros_tarefas['envolvido'];?>
		
		<?php echo "\n <br>"; ?></strong>	
	 
	 <?php
		
		 $area=$registros_tarefas['area'];
		
	$selecao_area=mysqli_query($conexao,"select * from areas WHERE ID='$area'");
	$registros_area=mysqli_fetch_array($selecao_area);		
		
	?>	
	 Área: <?php $exibir_area= $registros_area['area']; if($exibir_area==''){$exibir_area='n/preenchida';}echo $exibir_area;?>
		
		<?php echo "\n <br>"; ?><?php echo "\n <br>"; ?></strong>	
	 
	
	 
	 
	 
	 
	
	<?php }  echo "\n <br>";}
	

	} ?>
</td>	
	
	
	
	
	
	
</tr>
	 


<?php $var=$var+1; } ?>


</table>

















