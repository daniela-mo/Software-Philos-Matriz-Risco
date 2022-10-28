<?php

header("Content-type: application/vnd.ms-excel");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=relatorio-riscos.xls");
header("Pragma: no-cache");


?>

<meta charset='utf-8'>
<table>
	<tr>
		<th>ID</th>

		<th>DATA DE IDENTIFICAÇÃO</th>
		<th>RISCO OEA</th>
		<th>EVENTO DO RISCO</th>

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

		<th>ÁREAS RISCOS</th>

		<th>RISCO INERENTE - PROBABILIDADE</th>
		<th>RISCO INERENTE - IMPACTO</th>
		<th>RISCO INERENTE - NÍVEL DE RISCO</th>
		<th>RISCO INERENTE - DECISÃO DO TRATAMENTO</th>

		<th>RISCO RESIDUAL - PROBABILIDADE</th>
		<th>RISCO RESIDUAL - IMPACTO</th>
		<th>RISCO RESIDUAL - NÍVEL DE RISCO</th>
		<th>RISCO RESIDUAL - DECISÃO DO TRATAMENTO</th>

		<th>RISCO FUTURO - PROBABILIDADE</th>
		<th>RISCO FUTURO - IMPACTO</th>
		<th>RISCO FUTURO - NÍVEL DE RISCO</th>
		<th>RISCO FUTURO - DECISÃO DO TRATAMENTO</th>


		<th>TRATAMENTO</th>
		<th>RESPONSAVEL</th>
		<th>PRAZO DE ENTREGA</th>

	</tr>




	<?php
	session_start();
	$obterdominio = $_SESSION['dominio'];
	include($obterdominio . '/' . 'conexao.php');;

	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');

	$selecao = mysqli_query($conexao, "select * from identificacao_do_risco");
	$selecao_qaa = mysqli_query($conexao, "select * from questoes_qaa WHERE questao_principal='0' order by titulo ASC");
	while ($registros_qaa = mysqli_fetch_array($selecao_qaa)) {

		while ($registros = mysqli_fetch_array($selecao)) {
			$classificacao_risco = $registros['classificacao_risco'];
			$codigo_matriz = $registros['id'];;
	?>


			<tr>
				<th><?php echo $registros['codigo'] ?></th>

				<th><?php $data = $registros['data_id_risco'];

					$ano = substr($data, 0, 4);
					$mes = substr($data, 5, 2);
					$dia = substr($data, 8, 2);

					echo $dia . "/" . $mes . "/" . $ano;

					?></th>
				<th>
					<?php

					echo $registros['criterio_correspondente'];

					?>
				</th>

				<th><?php echo $registros['evento_risco'] ?></th>

				<th>
					<?php
					///////////////////////////////////////// Causa MÉTODO ///////////////////////////////////////////*/
					$selecao_causa = mysqli_query($conexao, "select * from tabela_causa_efeito_temp WHERE setor='Metodo' and codigo_matriz='$codigo_matriz' ");
					while ($registros_causa = mysqli_fetch_array($selecao_causa)) {
						echo  $registros_causa['causa']; ?><br>
					<?php } ?>
				</th>

				<th>
					<?php
					///////////////////////////////////////// Efeito MÉTODO ///////////////////////////////////////////*/
					$selecao_efeito = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE tipo='Metodo' and codigo_matriz='$codigo_matriz'");
					$registros_efeito = mysqli_fetch_array($selecao_efeito);
					echo $registros_efeito['efeito'];
					?>
				</th>



				<th>
					<?php
					///////////////////////////////////////// Causa MEDIDAS ///////////////////////////////////////////*/
					$selecao_causa = mysqli_query($conexao, "select * from tabela_causa_efeito_temp WHERE setor='Medidas' and codigo_matriz='$codigo_matriz' ");
					while ($registros_causa = mysqli_fetch_array($selecao_causa)) {
						echo  $registros_causa['causa']; ?><br>
					<?php } ?>
				</th>

				<th>
					<?php
					///////////////////////////////////////// Efeito MEDIDAS ///////////////////////////////////////////*/
					$selecao_efeito2 = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE tipo='Medidas' and codigo_matriz='$codigo_matriz'");
					$registros_efeito2 = mysqli_fetch_array($selecao_efeito2);
					echo $registros_efeito2['efeito'];
					?>
				</th>


				<th>
					<?php
					///////////////////////////////////////// Causa MÃO DE OBRA ///////////////////////////////////////////*/
					$selecao_causa = mysqli_query($conexao, "select * from tabela_causa_efeito_temp WHERE setor='Mao de obra' and codigo_matriz='$codigo_matriz' ");
					while ($registros_causa = mysqli_fetch_array($selecao_causa)) {
						echo  $registros_causa['causa']; ?><br>
					<?php } ?>
				</th>

				<th>
					<?php
					///////////////////////////////////////// Efeito MÃO DE OBRA ///////////////////////////////////////////*/
					$selecao_efeito2 = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE tipo='Mao de obra' and codigo_matriz='$codigo_matriz'");
					$registros_efeito2 = mysqli_fetch_array($selecao_efeito2);
					echo $registros_efeito2['efeito'];
					?>
				</th>



				<th>
					<?php
					///////////////////////////////////////// Causa MÁQUINA ///////////////////////////////////////////*/
					$selecao_causa = mysqli_query($conexao, "select * from tabela_causa_efeito_temp WHERE setor='Máquina' and codigo_matriz='$codigo_matriz' ");
					while ($registros_causa = mysqli_fetch_array($selecao_causa)) {
						echo  $registros_causa['causa']; ?><br>
					<?php } ?>
				</th>

				<th>
					<?php
					///////////////////////////////////////// Efeito MÁQUINA ///////////////////////////////////////////*/
					$selecao_efeito2 = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE tipo='Máquina' and codigo_matriz='$codigo_matriz'");
					$registros_efeito2 = mysqli_fetch_array($selecao_efeito2);
					echo $registros_efeito2['efeito'];
					?>
				</th>



				<th>
					<?php
					///////////////////////////////////////// Causa MEIO AMBIENTE ///////////////////////////////////////////*/
					$selecao_causa = mysqli_query($conexao, "select * from tabela_causa_efeito_temp WHERE setor='Meio Ambiente' and codigo_matriz='$codigo_matriz' ");
					while ($registros_causa = mysqli_fetch_array($selecao_causa)) {
						echo  $registros_causa['causa']; ?><br>
					<?php } ?>
				</th>

				<th>
					<?php
					///////////////////////////////////////// Efeito MEIO AMBIENTE ///////////////////////////////////////////*/
					$selecao_efeito2 = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE tipo='Meio Ambiente' and codigo_matriz='$codigo_matriz'");
					$registros_efeito2 = mysqli_fetch_array($selecao_efeito2);
					echo $registros_efeito2['efeito'];
					?>
				</th>





				<th>
					<?php
					///////////////////////////////////////// Causa MATERIAIS ///////////////////////////////////////////*/
					$selecao_causa = mysqli_query($conexao, "select * from tabela_causa_efeito_temp WHERE setor='Materiais' and codigo_matriz='$codigo_matriz' ");
					while ($registros_causa = mysqli_fetch_array($selecao_causa)) {
						echo  $registros_causa['causa']; ?><br>
					<?php } ?>
				</th>

				<th>
					<?php
					///////////////////////////////////////// Efeito MATERIAIS ///////////////////////////////////////////*/
					$selecao_efeito2 = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE tipo='Materiais' and codigo_matriz='$codigo_matriz'");
					$registros_efeito2 = mysqli_fetch_array($selecao_efeito2);
					echo $registros_efeito2['efeito'];
					?>
				</th>


				<th><?php echo $registros['area'];

					?>
					<?php
					////////////////////////////////*DEMAIS ÁREAS //////////////////////////////////////////*
					$selecao2 = mysqli_query($conexao, "select * from areas_identificacao_de_risco WHERE codigo_id_risco='$codigo_matriz'");
					while ($registros2 = mysqli_fetch_array($selecao2)) {

						echo $registros2['area'];
						echo "\n <br>";
					}
					?>



				</th>






				<th>
					<?php $selecao_inerente = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
					$num = mysqli_num_rows($selecao_inerente);
					$registros_inerente = mysqli_fetch_array($selecao_inerente);
					$exibir_probabilidade = $registros_inerente['probabilidade'];

					if ($exibir_probabilidade == 1) {
						echo $exibir_probabilidade = 'Rara';
					}
					if ($exibir_probabilidade == 2) {
						echo $exibir_probabilidade = 'Improvável';
					}
					if ($exibir_probabilidade == 3) {
						echo $exibir_probabilidade = 'Possível';
					}
					if ($exibir_probabilidade == 4) {
						echo $exibir_probabilidade = 'Provável';
					}
					if ($exibir_probabilidade == 5) {
						echo $exibir_probabilidade = 'Quase Certo';
					}
					?>
				</th>

				<th>
					<?php $selecao_inerente = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
					$num = mysqli_num_rows($selecao_inerente);
					$registros_inerente = mysqli_fetch_array($selecao_inerente);
					$exibir_impacto = $registros_inerente['impacto'];

					if ($exibir_impacto == 5) {
						echo $exibir_impacto = 'Insignificante';
					}
					if ($exibir_impacto == 8) {
						echo $exibir_impacto = 'Baixo';
					}
					if ($exibir_impacto == 17) {
						echo $exibir_impacto = 'Moderado';
					}
					if ($exibir_impacto == 27) {
						echo $exibir_impacto = 'Alto';
					}
					if ($exibir_impacto == 40) {
						echo $exibir_impacto = 'Catastrófico';
					}
					?>
				</th>

				<th>
					<?php $selecao_inerente = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
					$registros_inerente = mysqli_fetch_array($selecao_inerente);
					echo $registros_inerente['nivel'] . PHP_EOL;
					?>
				</th>

				<th>
					<?php $selecao_inerente = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$codigo_matriz'");
					$registros_inerente = mysqli_fetch_array($selecao_inerente);
					echo $registros_inerente['decisao'] . PHP_EOL;
					?>
				</th>




				<th>
					<?php $selecao_residual = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
					$num = mysqli_num_rows($selecao_residual);
					$registros_residual = mysqli_fetch_array($selecao_residual);
					$exibir_probabilidade = $registros_residual['probabilidade'];

					if ($exibir_probabilidade == 1) {
						echo $exibir_probabilidade = 'Rara';
					}
					if ($exibir_probabilidade == 2) {
						echo $exibir_probabilidade = 'Improvável';
					}
					if ($exibir_probabilidade == 3) {
						echo $exibir_probabilidade = 'Possível';
					}
					if ($exibir_probabilidade == 4) {
						echo $exibir_probabilidade = 'Provável';
					}
					if ($exibir_probabilidade == 5) {
						echo $exibir_probabilidade = 'Quase Certo';
					}
					?>
				</th>
				<th>
					<?php $selecao_residual = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
					$num = mysqli_num_rows($selecao_residual);
					$registros_residual = mysqli_fetch_array($selecao_residual);
					$exibir_impacto = $registros_residual['impacto'];

					if ($exibir_impacto == 5) {
						echo $exibir_impacto = 'Insignificante';
					}
					if ($exibir_impacto == 8) {
						echo $exibir_impacto = 'Baixo';
					}
					if ($exibir_impacto == 17) {
						echo $exibir_impacto = 'Moderado';
					}
					if ($exibir_impacto == 27) {
						echo $exibir_impacto = 'Alto';
					}
					if ($exibir_impacto == 40) {
						echo $exibir_impacto = 'Catastrófico';
					}
					?>
				</th>

				<th>
					<?php $selecao_residual = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
					$registros_residual = mysqli_fetch_array($selecao_residual);
					echo $registros_residual['nivel'] . PHP_EOL;

					?>
				</th>

				<th>
					<?php $selecao_residual = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$codigo_matriz'");
					$registros_residual = mysqli_fetch_array($selecao_residual);
					echo $registros_residual['decisao'] . PHP_EOL;

					?>
				</th>







				<th>
					<?php $selecao_futuro = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$codigo_matriz'");
					$num = mysqli_num_rows($selecao_futuro);
					$registros_futuro = mysqli_fetch_array($selecao_futuro);
					$exibir_probabilidade = $registros_futuro['probabilidade'];

					if ($exibir_probabilidade == 1) {
						echo $exibir_probabilidade = 'Rara';
					}
					if ($exibir_probabilidade == 2) {
						echo $exibir_probabilidade = 'Improvável';
					}
					if ($exibir_probabilidade == 3) {
						echo $exibir_probabilidade = 'Possível';
					}
					if ($exibir_probabilidade == 4) {
						echo $exibir_probabilidade = 'Provável';
					}
					if ($exibir_probabilidade == 5) {
						echo $exibir_probabilidade = 'Quase Certo';
					}




					?>

				</th>
				<th>
					<?php $selecao_futuro = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$codigo_matriz'");
					$num = mysqli_num_rows($selecao_futuro);
					$registros_futuro = mysqli_fetch_array($selecao_futuro);
					$exibir_impacto = $registros_futuro['impacto'];

					if ($exibir_impacto == 5) {
						echo $exibir_impacto = 'Insignificante';
					}
					if ($exibir_impacto == 8) {
						echo $exibir_impacto = 'Baixo';
					}
					if ($exibir_impacto == 17) {
						echo $exibir_impacto = 'Moderado';
					}
					if ($exibir_impacto == 27) {
						echo $exibir_impacto = 'Alto';
					}
					if ($exibir_impacto == 40) {
						echo $exibir_impacto = 'Catastrófico';
					}

					?>
				</th>
				<th>
					<?php $selecao_futuro = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$codigo_matriz'");
					$registros_futuro = mysqli_fetch_array($selecao_futuro);
					echo $registros_futuro['nivel'] . PHP_EOL;
					?>
				</th>
				<th>
					<?php $selecao_futuro = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$codigo_matriz'");
					$registros_futuro = mysqli_fetch_array($selecao_futuro);
					echo $registros_futuro['decisao'] . PHP_EOL;
					?>
				</th>


				<th>
					<?php
					$selecao_workflow = mysqli_query($conexao, "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz' and tratamento='1'");
					while ($registros_workflow = mysqli_fetch_array($selecao_workflow))

						echo  $registros_workflow['planejamento'] . ' - ' . PHP_EOL; {
						echo "\n <br>"; ?>


					<?php }
					echo "\n <br>"; ?>
				</th>

				<th>
					<?php
					$selecao_workflow = mysqli_query($conexao, "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz' and tratamento='1'");
					while ($registros_workflow = mysqli_fetch_array($selecao_workflow))

						echo  $registros_workflow['responProc'] . ' - ' . PHP_EOL; {
						echo "\n <br>"; ?>

					<?php }
					echo "\n <br>"; ?>
				</th>

				<th>
					<?php
					$selecao_workflow = mysqli_query($conexao, "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz' and tratamento='1'");
					while ($registros_workflow = mysqli_fetch_array($selecao_workflow)) {

						$data1 = $registros_workflow['data_vencimento'];

						$ano1 = substr($data1, 0, 4);
						$mes1 = substr($data1, 5, 2);
						$dia1 = substr($data1, 8, 2);

						echo $dia1 . "/" . $mes1 . "/" . $ano1 . ' - ' . PHP_EOL;
					}
					echo "\n <br>"; ?>
				</th>



			</tr>




	<?php }
	} ?>


</table>