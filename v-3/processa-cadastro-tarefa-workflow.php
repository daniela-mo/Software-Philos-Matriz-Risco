<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;
$codigo=$_POST['codigo'];
$tarefa=$_POST['tarefa'];
$descricao=$_POST['descricao'];
$descricao=addslashes($descricao);
$data_inicio=$_POST['datainicio'];
$data_termino=$_POST['datatermino'];

$data_criacao=date('d-m-Y');
$hora_criacao=date('H:m:s');

$marco=$_POST['marco'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$inserir=mysqli_query($conexao,"insert into tarefas_planejamento_workflow(tarefa,descricao,data,hora,codigo_planejamento,data_inicio,data_termino,codigo_fase)values('$tarefa','$descricao','$data_criacao','$hora_criacao','$codigo','$data_inicio','$data_termino','$marco')");

if($inserir){ 

$selecao1=mysqli_query($conexao,"select * from tarefas_planejamento_workflow order by id DESC");
$registros1=mysqli_fetch_array($selecao1);
$id=$registros1['id'];	

$selecao=mysqli_query($conexao,"select * from upload_temp_workflow");
while($registros=mysqli_fetch_array($selecao)){
$arquivo=$registros['arquivo'];
	
$inserir=mysqli_query($conexao,"insert into upload_workflow(arquivo,codigo_cadastro,data,hora)values('$arquivo','$id','$data','$hora')")	;

}
?>

<script>
	
</script>
	
<?php }else{ ?>
<script>
	
</script>	

<?php } ?>



