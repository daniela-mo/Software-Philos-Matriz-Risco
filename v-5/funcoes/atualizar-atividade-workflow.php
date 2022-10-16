<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$planejamento = $_POST['nome'];
$descricao = $_POST['descricao'];
$descricao = addslashes($descricao);
$inicio = $_POST['cad-data-inicio'];
$vencimento = $_POST['cad-data-vencimento'];
$status = $_POST['status'];



@$data_min = $_POST['inicio'];
$ano_min = substr($data_min, 6, 10);
$mes_min = substr($data_min, 3, 2);
$dia_min = substr($data_min, 0, 2);

@$data_min = $ano_min . "-" . $mes_min . "-" . $dia_min;


@$data_max = $_POST['vencimento'];
$ano_max = substr($data_max, 6, 10);
$mes_max = substr($data_max, 3, 2);
$dia_max = substr($data_max, 0, 2);

@$data_max = $ano_max . "-" . $mes_max . "-" . $dia_max;



mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$sql = mysqli_query($conexao, "update workflow set planejamento='$planejamento', descricao='$descricao', data_inicio='$data_min',
data_vencimento='$data_max', status='$status' WHERE id='$codigo'");


$atualizar = mysqli_query($conexao, $sql);

if ($atualizar) {

	// <div class="alert alert-success" role="alert">
	// 	Dados Atualizados com Sucesso!
	// </div>

?>
<?php } else { ?>


<?php }

?>