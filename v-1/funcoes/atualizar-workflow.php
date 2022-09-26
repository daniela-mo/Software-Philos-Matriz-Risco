<script>
	// alert("teste")
</script>
<?php
session_start();
$obterdominio = $_SESSION['dominio'];


include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$planejamento = $_POST['planejamento'];
$data_inicio = $_POST['inicio'];
$status = $_POST['status'];
$responProc = $_POST['responProc'];
$descricao = $_POST['descricao'];



@$data_min = $_POST['inicio'];
$ano_min = substr($data_min, 6, 10);
$mes_min = substr($data_min, 3, 2);
$dia_min = substr($data_min, 0, 2);

// @$data_min =  $dia_min . "-" . $mes_min . "-" . $ano_min;
@$data_min =  $ano_min . "-" . $mes_min . "-" . $dia_min;


$data_vencimento = $_POST['vencimento'];

@$data_max = $_POST['vencimento'];
$ano_max = substr($data_max, 6, 10);
$mes_max = substr($data_max, 3, 2);
$dia_max = substr($data_max, 0, 2);

// @$data_max =  $dia_max . "-" . $mes_max . "-" . $ano_max;
@$data_max = $ano_max . "-" . $mes_max . "-" . $dia_max;


$periodicidade = $_POST['periodicidade'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$sql = "update workflow set planejamento='$planejamento',descricao='$descricao',data_inicio='$data_min',data_vencimento='$data_max',status='$status',periodicidade='$periodicidade',responProc='$responProc'  WHERE id='$codigo'";



print $sql;

$atualizar = mysqli_query($conexao, $sql);



if ($atualizar) { ?>

	<script>
		alert('Planejamento alterado!')
	</script>




<?php } else { ?>

	<script>
		alert('Planejamento não alterado!')
	</script>
<?php } ?>