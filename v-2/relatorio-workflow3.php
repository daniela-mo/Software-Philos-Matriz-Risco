<?php
 





?>

<meta charset='utf-8'>
 <table>
				 	<tr>
						<th>ID</th>
						<th>EVENTO DO RISCO</th>
						<th>ORIGEM</th>
						<th>FATOR DO RISCO</th>
						<th>DATA DE IDENTIFICAÇÃO</th>
						<th>CLASSIF. DO RISCO</th>
						
						<th>CAUSA - Método</th>
						<th>EFEITO - Método</th>
						
						<th>CAUSA - Medidas</th>
						<th>EFEITO - Medidas</th>
						
						<th>CAUSA - Mão de Obra</th>
						<th>EFEITO - Mão de Obra</th>
						
						<th>CAUSA - Máquina</th>
						<th>EFEITO - Máquina</th>
						
						<th>CAUSA - Meio Ambiente</th>
						<th>EFEITO - Meio Ambiente</th>
						
						<th>CAUSA - Materiais</th>
						<th>EFEITO - Materiais</th>
						
						
						<th>RISCO INERENTE</th>
						<th>RISCO RESIDUAL</th>
						<th>RISCO FUTURO</th>
						<th>RISCO OEA</th>
						
						<th>ÁREAS RISCOS</th>
						
						<th>TRATAMENTO</th>
						
					</tr>
				 



<?php
	 session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

	 	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	 
	
	 

$selecao=mysqli_query($conexao,"select * from identificacao_do_risco");	
	 
	 
while($registros=mysqli_fetch_array($selecao)){
	$classificacao_risco=$registros['classificacao_risco'];
	$codigo_matriz=$registros['id'];;
?>


<tr>
						<th><?php echo $registros['id'] ?></th>
						<th><?php echo $registros['evento_risco'] ?></th>
						<th><?php echo $registros['origem'] ?></th>
						<th><?php echo $registros['fator_risco'] ?></th>
						<th><?php $data= $registros['data_id_risco'];
							
	$ano=substr($data,0,4);
	$mes=substr($data,5,2);
	$dia=substr($data,8,2);
							
		echo $dia."/".$mes."/".$ano;					
							
							?></th>
	<th>
	<?php $selecao_parametrizacao=mysqli_query($conexao,"select * from parametrizacao WHERE id='$classificacao_risco'");
   $registros_parametrizacao=mysqli_fetch_array($selecao_parametrizacao);
   echo  $registros_parametrizacao['nome']; ?>
	</th>
	
	
	<th>
	<?php
	///////////////////////////////////////// Causa MÉTODO ///////////////////////////////////////////*/
	$selecao_causa=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE setor='Metodo' and codigo_matriz='$codigo_matriz' ");
   while($registros_causa=mysqli_fetch_array($selecao_causa)){
   echo  $registros_causa['causa']; ?><br>
	<?php } ?>
	</th>
	
	<th>
		<?php
	///////////////////////////////////////// Efeito MÉTODO ///////////////////////////////////////////*/
		$selecao_efeito=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Metodo' and codigo_matriz='$codigo_matriz'");
		$registros_efeito=mysqli_fetch_array($selecao_efeito);
	echo $registros_efeito['efeito'];
	?>
	</th>
	
	
	
	<th>
	<?php
	///////////////////////////////////////// Causa MEDIDAS ///////////////////////////////////////////*/
	$selecao_causa=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE setor='Medidas' and codigo_matriz='$codigo_matriz' ");
   while($registros_causa=mysqli_fetch_array($selecao_causa)){
   echo  $registros_causa['causa']; ?><br>
	<?php } ?>
	</th>
	
	<th>
		<?php
	///////////////////////////////////////// Efeito MEDIDAS ///////////////////////////////////////////*/
		$selecao_efeito2=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Medidas' and codigo_matriz='$codigo_matriz'");
		$registros_efeito2=mysqli_fetch_array($selecao_efeito2);
	echo $registros_efeito2['efeito'];
	?>
	</th>
	
	
		<th>
	<?php
	///////////////////////////////////////// Causa MÃO DE OBRA ///////////////////////////////////////////*/
	$selecao_causa=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE setor='Mao de obra' and codigo_matriz='$codigo_matriz' ");
   while($registros_causa=mysqli_fetch_array($selecao_causa)){
   echo  $registros_causa['causa']; ?><br>
	<?php } ?>
	</th>
	
	<th>
		<?php
	///////////////////////////////////////// Efeito MÃO DE OBRA ///////////////////////////////////////////*/
		$selecao_efeito2=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Mao de obra' and codigo_matriz='$codigo_matriz'");
		$registros_efeito2=mysqli_fetch_array($selecao_efeito2);
	echo $registros_efeito2['efeito'];
	?>
	</th>
	
	
	
			<th>
	<?php
	///////////////////////////////////////// Causa MÁQUINA ///////////////////////////////////////////*/
	$selecao_causa=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE setor='Máquina' and codigo_matriz='$codigo_matriz' ");
   while($registros_causa=mysqli_fetch_array($selecao_causa)){
   echo  $registros_causa['causa']; ?><br>
	<?php } ?>
	</th>
	
	<th>
		<?php
	///////////////////////////////////////// Efeito MÁQUINA ///////////////////////////////////////////*/
		$selecao_efeito2=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Máquina' and codigo_matriz='$codigo_matriz'");
		$registros_efeito2=mysqli_fetch_array($selecao_efeito2);
	echo $registros_efeito2['efeito'];
	?>
	</th>
	
	
	
	<th>
	<?php
	///////////////////////////////////////// Causa MEIO AMBIENTE ///////////////////////////////////////////*/
	$selecao_causa=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE setor='Meio Ambiente' and codigo_matriz='$codigo_matriz' ");
   while($registros_causa=mysqli_fetch_array($selecao_causa)){
   echo  $registros_causa['causa']; ?><br>
	<?php } ?>
	</th>
	
	<th>
		<?php
	///////////////////////////////////////// Efeito MEIO AMBIENTE ///////////////////////////////////////////*/
		$selecao_efeito2=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Meio Ambiente' and codigo_matriz='$codigo_matriz'");
		$registros_efeito2=mysqli_fetch_array($selecao_efeito2);
	echo $registros_efeito2['efeito'];
	?>
	</th>
	
	
	
	
	
		<th>
	<?php
	///////////////////////////////////////// Causa MATERIAIS ///////////////////////////////////////////*/
	$selecao_causa=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE setor='Materiais' and codigo_matriz='$codigo_matriz' ");
   while($registros_causa=mysqli_fetch_array($selecao_causa)){
   echo  $registros_causa['causa']; ?><br>
	<?php } ?>
	</th>
	
	<th>
		<?php
	///////////////////////////////////////// Efeito MATERIAIS ///////////////////////////////////////////*/
		$selecao_efeito2=mysqli_query($conexao,"select * from diagrama_ishikawa_efeitos WHERE tipo='Materiais' and codigo_matriz='$codigo_matriz'");
		$registros_efeito2=mysqli_fetch_array($selecao_efeito2);
	echo $registros_efeito2['efeito'];
	?>
	</th>
	
	
	
	
	
	
	
	
	
	<th>	
	<?php $selecao_inerente=mysqli_query($conexao,"select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
   $registros_inerente=mysqli_fetch_array($selecao_inerente);
	
   echo "Probabilidade: ". $registros_inerente['probabilidade'].PHP_EOL;
	echo "\n <br>";
	
	 echo "Impacto: ". $registros_inerente['impacto'].PHP_EOL;
	echo "\n <br>";
	
	 echo "Nivel do Risco: ". $registros_inerente['nivel'].PHP_EOL;
		
		
		
		
		?>
	</th>
	
	<th>	
	<?php $selecao_residual=mysqli_query($conexao,"select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
   $registros_residual=mysqli_fetch_array($selecao_residual);
   echo "Probabilidade: ". $registros_residual['probabilidade'].PHP_EOL;
	echo "\n <br>";
	
	 echo "Impacto: ". $registros_residual['impacto'].PHP_EOL; 
	echo "\n <br>";
	
	 echo "Nivel do Risco: ". $registros_residual['nivel'].PHP_EOL; 
	
	?>
	</th>
	
	<th>	
	<?php $selecao_futuro=mysqli_query($conexao,"select * from avaliacao_risco_futuro WHERE codigo_matriz='$codigo_matriz'");
   $registros_futuro=mysqli_fetch_array($selecao_futuro);
    echo "Probabilidade: ". $registros_futuro['probabilidade'].PHP_EOL;
	echo "\n <br>";
	
	 echo "Impacto: ". $registros_futuro['impacto'].PHP_EOL; 
	echo "\n <br>";
	
	 echo "Nivel do Risco: ". $registros_futuro['nivel'].PHP_EOL;
		
		
		?>
	</th>
	
	<th><?php echo $registros['item_oea'] ?></th>
						
	<th><?php echo $registros['area'];
		
		?>
	<?php
	   ////////////////////////////////*DEMAIS ÁREAS //////////////////////////////////////////*
	$selecao2=mysqli_query($conexao,"select * from areas_identificacao_de_risco WHERE codigo_id_risco='$codigo_matriz'");
	while($registros2=mysqli_fetch_array($selecao2)){   
	
	echo $registros2['area']; echo "\n <br>";
	}
		?>	
	
		
		
	</th>
						

	<th>	
	<?php 
	$selecao_workflow=mysqli_query($conexao,"select * from workflow WHERE codigo_matriz_risco='$codigo_matriz' and tratamento='1'");
    $registros_workflow=mysqli_fetch_array($selecao_workflow);
		echo  $registros_workflow['planejamento'];echo "\n <br>"; ?> 
		
		<?php if($registros_workflow['data_inicio']!=''){ ?>
		Inicio: <?php  echo  $registros_workflow['data_inicio']; ?>, </br>
	 	<?php } ?>
	 
	 	<?php if($registros_workflow['data_vencimento']!=''){ ?>
		Término: <?php  echo  $registros_workflow['data_vencimento']; ?>,  </br>
		<?php } ?>
	
		<?php if($registros_workflow['status']!=''){ ?>
		Status: <?php  echo  $registros_workflow['status']; ?>
		<?php } ?>
		
	</th>
	
	
	
					</tr>




<?php } ?>


</table>

















