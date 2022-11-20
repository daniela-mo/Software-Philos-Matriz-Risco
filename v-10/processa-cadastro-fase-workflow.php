<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');


$codigo = $_POST['codigo'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];
$periodicidade = $_POST['periodicidade'];
$descricao = addslashes($descricao);

$data_criacao = date('d-m-Y');
$hora_criacao = date('H:m:s');

$data_inicio = $_POST['datainicio'];


$dia1 = substr($data_inicio, 0, 2);
$mes1 = substr($data_inicio, 3, 2);
$ano1 = substr($data_inicio, 6, 4);



@$data_min = $_POST['datainicio'];
$ano_min = substr($data_min, 6, 10);
$mes_min = substr($data_min, 3, 2);
$dia_min = substr($data_min, 0, 2);

@$data_min = $ano_min . "-" . $mes_min . "-" . $dia_min;





if ($dia1 > 31) { ?>
	<script>
		alert("Campo 'Dia' em Data de Inicio preenchido incorretamente!")
		window.history.back();
	</script>
<?php } else if ($mes1 >= 12) {	?>
	<script>
		alert("Campo 'Mês' em Data de Inicio preenchido incorretamente!")
		window.history.back();
	</script>
<?php } else if ($ano1 <= 1999) { ?>
	<script>
		alert("Campo 'Ano' em Data de Inicio preenchido incorretamente!")
		window.history.back();
	</script>
	<?php	} else {

	$data_termino = $_POST['datatermino'];


	$dia1 = substr($data_termino, 0, 2);
	$mes1 = substr($data_termino, 3, 2);
	$ano1 = substr($data_termino, 6, 4);




	@$data_max = $_POST['datatermino'];
	$ano_max = substr($data_max, 6, 10);
	$mes_max = substr($data_max, 3, 2);
	$dia_max = substr($data_max, 0, 2);

	@$data_max = $ano_max . "-" . $mes_max . "-" . $dia_max;





	if ($dia1 > 31) { ?>
		<script>
			alert("Campo 'Dia' em Data de Término preenchido incorretamente!")
			window.history.back();
		</script>
	<?php } else if ($mes1 >= 12) {	?>
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



		mysqli_query($conexao, "SET NAMES 'utf8'");
		mysqli_query($conexao, 'SET character_set_connection=utf8');
		mysqli_query($conexao, 'SET character_set_client=utf8');
		mysqli_query($conexao, 'SET character_set_results=utf8');
		$inserir = mysqli_query($conexao, "insert into fases_workflow(fase,descricao,data,hora,codigo_planejamento,data_inicio,data_termino,status,periodicidade)values('$titulo','$descricao','$data_criacao','$hora_criacao','$codigo','$data_min','$data_max','$status','$periodicidade')");

		if ($inserir) { ?>

			<script>
				location.href = "pesquisar-marcos.php?cod=<?php echo $codigo ?>"
			</script>

		<?php } else { ?>
			<script>

			</script>

<?php }
	}
} ?>