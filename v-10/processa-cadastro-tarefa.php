<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
$codigo=$_POST['codigo'];
$tarefa=$_POST['cad-tarefa'];
$prioridade=$_POST['cad-prioridade'];
$descricao=$_POST['cad-descricao'];
$descricao=addslashes($descricao);
$data_inicio=$_POST['cad-data-inicio'];
$data_termino=$_POST['cad-data-termino'];

$data_criacao=date('d-m-Y');
$hora_criacao=date('H:m:s');

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$inserir=mysqli_query($conexao,"insert into tarefas_planejamento(tarefa,prioridade,descricao,data,hora,codigo_planejamento,data_inicio,data_termino)values('$tarefa','$prioridade','$descricao','$data_criacao','$hora_criacao','$codigo','$data_inicio','$data_termino')");

if($inserir){ ?>

<script>
	location.href="tarefas-planejamento.php?cod=<?php echo $codigo ?>"
</script>
	
<?php }else{ ?>
<script>
	location.href="tarefas-planejamento.php?cod=<?php echo $codigo ?>"
</script>	

<?php } ?>



