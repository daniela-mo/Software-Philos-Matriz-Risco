<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
?>


<?php

$codigo=$_POST['codigo'];

            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$selecao=mysqli_query($conexao,"select * from planejamentos WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);

$planejamento=$registros['planejamento'];
$prioridade=$registros['prioridade'];
$descricao=$registros['descricao'];
$data_vencimento=$registros['data_vencimento'];
$data_inicio=$registros['data_inicio'];

$data_criacao=date('d-m-Y');
$hora_criacao=date('H:m:s');

$inserir=mysqli_query($conexao,"insert into planejamentos(planejamento,prioridade,descricao,data_vencimento,data,hora,data_inicio)values('$planejamento','$prioridade','$descricao','$data_vencimento','$data_criacao','$hora_criacao','$data_inicio')");

$selecao1=mysqli_query($conexao,"select * from planejamentos ORDER BY id DESC");
$registros1=mysqli_fetch_array($selecao1);
$codigo_novo=$registros1['id'];

$selecao_fases=mysqli_query($conexao,"select * from fases WHERE codigo_planejamento='$codigo' ");
while($registros_fases=mysqli_fetch_array($selecao_fases)){ 

	$fase=$registros_fases['fase'];
	$descricao_fase=$registros_fases['descricao'];
	$data_inicio_fase=$registros_fases['data_inicio'];
	$data_termino_fase=$registros_fases['data_termino'];

?>


<?php
$inserir_fase=mysqli_query($conexao,"insert into fases(fase,descricao,data_inicio,data_termino,data,hora,codigo_planejamento)values('$fase','$descricao_fase','$data_inicio_fase','$data_termino_fase','$data_criacao','$hora_criacao','$codigo_novo') ");	
?>	


	
<?php }

if($inserir){ ?>

<script>
	location.href="planejamentos.php"
</script>
	
<?php }else{ ?>
<script>
	location.href="planejamentos.php"
</script>	

<?php } ?>

