<script>
	alert("teste")
</script>
<?php
session_start();
$obterdominio = $_SESSION['dominio'];


include('../' . $obterdominio . '/' . 'conexao.php');

$codigo = $_POST['codigo'];
$tarefa = $_POST['tarefa'];
$data_inicio = $_POST['inicio'];
$status = $_POST['status'];
$itemQaa = $_POST['itemQaa'];
$responProc = $_POST['responProc'];
$responAcao = $_POST['responAcao'];
$area = $_POST['area'];
$empresa = $_POST['empresa'];
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
$descricao = $_POST['descricao'];


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



// if ($empresa == 0) {
// 	$empresa = 'NEXA RECURSOS MINERAIS S.A. - TM ';
// }
// if ($empresa == 1) {
// 	$empresa = "NEXA RECURSOS MINERAIS S.A. - JF ";
// }
// if ($empresa == 2) {
// 	$empresa = "NEXA RECURSOS MINERAIS S.A. - VZ ";
// }
// if ($empresa == 3) {
// 	$empresa = "NEXA RECURSOS MINERAIS S.A. - MA ";
// }
// if ($empresa == 4) {
// 	$empresa = "NEXA RECURSOS MINERAIS S.A. - ";
// }



@$data_min = $_POST['inicio'];
$ano_min = substr($data_min, 6, 10);
$mes_min = substr($data_min, 3, 2);
$dia_min = substr($data_min, 0, 2);

@$data_min = $ano_min . "-" . $mes_min . "-" . $dia_min;








$data_termino = $_POST['termino'];

@$data_max = $_POST['termino'];
$ano_max = substr($data_max, 6, 10);
$mes_max = substr($data_max, 3, 2);
$dia_max = substr($data_max, 0, 2);

@$data_max = $ano_max . "-" . $mes_max . "-" . $dia_max;






$envolvido = $_POST['envolvido'];

$periodicidade = $_POST['periodicidade'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$sql = "update tarefas_atividades_workflow set tarefa='$tarefa', descricao='$descricao', data_inicio='$data_min',
 data_termino='$data_max', envolvido='$envolvido', status='$status' ,
  periodicidade='$periodicidade', itemQaa='$itemQaa', responProc='$responProc',
  responAcao='$responAcao',area='$area',empresa='$empresa',departamento='$departamento',planoAcao='$planoAcao',
  mapaRisco='$mapaRisco',dtEnvioPlanoAcao='$dtEnvioPlanoAcao',dtRetornoPrazo='$dtRetornoPrazo',
  dtDevolutiva='$dtDevolutiva',diasRetPrazo='$diasRetPrazo',statusDevolutiva='$statusDevolutiva',
  pzAtendPlanAcao='$pzAtendPlanAcao',datAtendPlanAcao='$datAtendPlanAcao',diasAtraso='$diasAtraso',
  statusPrazoPlanoAcao='$statusPrazoPlanoAcao'  WHERE id='$codigo'";



// print $sql;
print $atualizar;

// 	$sql = "update tarefas_atividades_workflow set tarefa='$titulo', descricao='$descricao', data_inicio='$data_min',
//  data_termino='$data_max', envolvido='$envolvido', status='$status' ,
//   periodicidade='$periodicidade', area='$area'  WHERE id='$codigo'";

$atualizar = mysqli_query($conexao, $sql);

if ($atualizar) {

	$atualizar_anexos = mysqli_query($conexao, "select * from upload_temp_workflow");
	$registros = mysqli_fetch_array($atualizar_anexos);
	$arquivo = $registros['arquivo'];
	$data = date('d-m-Y');
	$hora = date("H:i:s");

	if ($arquivo != '') {

		$novo_anexo = mysqli_query($conexao, "insert into upload_workflow(arquivo,codigo_cadastro,data,hora)values('$arquivo','$codigo','$data','$hora')");
	}

	$excluir = mysqli_query($conexao, "delete  from upload_temp_workflow  ");

?>


<?php } else { ?>


<?php }

?>