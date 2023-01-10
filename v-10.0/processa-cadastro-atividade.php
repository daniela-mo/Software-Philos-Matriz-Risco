<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;


$codigo = $_POST['codigo'];
$atividade = $_POST['atividade'];
$prioridade = $_POST['cad-prioridade'];
$itemQaa = $_POST['itemQaa'];
$responProc = $_POST['responProc'];
$responAcao = $_POST['responAcao'];
$empresa = $_POST['razao_social'];
$departamento = $_POST['departamento'];
$planoAcao = $_POST['planoAcao'];
$mapaRisco = $_POST['mapaRisco'];
$dtEnvioPlanoAcao = $_POST['dtEnvioPlanoAcao'];
$dtRetornoPrazo = $_POST['dtRetornoPrazo'];
$dtDevolutiva = $_POST['dtDevolutiva'];
$diasRetPrazo = $_POST['diasRetPrazo'];
$statusDevolutiva = $_POST['statusDevolutiva'];
$pzAtendPlanAcao = $_POST['pzAtendPlanAcao'];
$datAtendPlanAcao = $_POST['datAtendPlanAcao'];
$diasAtraso = $_POST['diasAtraso'];
$statusPrazoPlanoAcao = $_POST['statusPrazoPlanoAcao'];
$envolvido = $_POST['cad-envolvido'];
$descricao = $_POST['cad-descricao'];
$descricao = addslashes($descricao);

if ($statusDevolutiva == 0) {
	$statusDevolutiva = 'Não iniciado';
}
if ($statusDevolutiva == 1) {
	$statusDevolutiva = "Dentro do Prazo";
}
if ($statusDevolutiva == 2) {
	$statusDevolutiva = "Em atraso";
}
if ($statusDevolutiva == 3) {
	$statusDevolutiva = "Concluído";
}


if ($statusPrazoPlanoAcao == 0) {
	$statusPrazoPlanoAcao = 'Não iniciado';
}
if ($statusPrazoPlanoAcao == 1) {
	$statusPrazoPlanoAcao = "Dentro do Prazo";
}
if ($statusPrazoPlanoAcao == 2) {
	$statusPrazoPlanoAcao = "Em atraso";
}
if ($statusPrazoPlanoAcao == 3) {
	$statusPrazoPlanoAcao = "Concluído";
}






$data_inicio = $_POST['cad-data-inicio'];

$dia1 = substr($data_inicio, 0, 2);
$mes1 = substr($data_inicio, 3, 2);
$ano1 = substr($data_inicio, 6, 4);


@$data_min = $_POST['cad-data-inicio'];
$ano_min = substr($data_min, 6, 10);
$mes_min = substr($data_min, 3, 2);
$dia_min = substr($data_min, 0, 2);

@$data_min = $ano_min . "-" . $mes_min . "-" . $dia_min;



if ($dia1 > 31) { ?>
	<script>
		alert("Campo 'Dia' em Data de Início preenchido incorretamente!")
		window.history.back();
	</script>
<?php } else if ($mes1 >= 12) {	?>
	<script>
		alert("Campo 'Mês' em Data de Início preenchido incorretamente!")
		window.history.back();
	</script>
<?php } else if ($ano1 <= 1999) { ?>
	<script>
		alert("Campo 'Ano' em Data de Início preenchido incorretamente!")
		window.history.back();
	</script>
	<?php	} else {




	$data_termino = $_POST['cad-data-termino'];


	$dia1 = substr($data_termino, 0, 2);
	$mes1 = substr($data_termino, 3, 2);
	$ano1 = substr($data_termino, 6, 4);


	@$data_max = $_POST['cad-data-termino'];
	$ano_max = substr($data_max, 6, 10);
	$mes_max = substr($data_max, 3, 2);
	$dia_max = substr($data_max, 0, 2);

	@$data_max = $ano_max . "-" . $mes_max . "-" . $dia_max;



	if ($dia1 > 31) { ?>
		<script>
			alert("Campo 'Dia' em Data de Término preenchido incorretamente!")
			window.history.back();
		</script>
	<?php } else if ($mes1 > 12) {	?>
		<script>
			alert("Campo 'Mês' em Data de Término preenchido incorretamente!")
			window.history.back();
		</script>
	<?php } else if ($ano1 <= 1999) { ?>
		<script>
			alert("Campo 'Ano' em Data de Término preenchido incorretamente!")
			window.history.back();
		</script>
		<?php	} else {






		$status = $_POST['cad-status'];
		$area = $_POST['cad-area'];

		$data_criacao = date('d-m-Y');
		$hora_criacao = date('H:m:s');

		mysqli_query($conexao, "SET NAMES 'utf8'");
		mysqli_query($conexao, 'SET character_set_connection=utf8');
		mysqli_query($conexao, 'SET character_set_client=utf8');
		mysqli_query($conexao, 'SET character_set_results=utf8');
		$inserir = mysqli_query($conexao, "insert into atividades_planejamento_workflow(
			atividade,
			prioridade,
			descricao,
			data,
			hora,
			codigo_atividade,
			data_inicio,
			data_termino,
			envolvido,
			status,
			itemQaa,
			responProc,
			responAcao,
			area,
			empresa,
			departamento,
			planoAcao,
			mapaRisco,
			dtEnvioPlanoAcao,
			dtRetornoPrazo,
			dtDevolutiva,
			diasRetPrazo,
			statusDevolutiva,
			pzAtendPlanAcao,
			datAtendPlanAcao,
			diasAtraso,
			statusPrazoPlanoAcao,
		)
			values(
			'$atividade',
			'$prioridade',
			'$descricao',
			'$data_criacao',
			'$hora_criacao',
			'$codigo',
			'$data_min',
			'$data_max',
			'$envolvido',
			'$status',
			'$itemQaa',
			'$responProc',
			'$responAcao',
			'$area',
			'$empresa',
			'$departamento',
			'$planoAcao',
			'$mapaRisco',
			'$dtEnvioPlanoAcao',
			'$dtRetornoPrazo',
			'$dtDevolutiva',
			'$diasRetPrazo',
			'$statusDevolutiva',
			'$pzAtendPlanAcao',
			'$datAtendPlanAcao',
			'$diasAtraso',
			'$statusPrazoPlanoAcao',
		
			)");

		if ($inserir) {



		?>


			<script>
				location.href = "planejamento-workflow.php?cod=<?php echo $codigo ?>"
				alert('Atividade Cadastrada!')
			</script>

		<?php } else { ?>
			<script>
				location.href = "planejamento-workflow.php?cod=<?php echo $codigo ?>"
				alert('Atividade não Cadastrada')
			</script>

<?php }
	}
} ?>