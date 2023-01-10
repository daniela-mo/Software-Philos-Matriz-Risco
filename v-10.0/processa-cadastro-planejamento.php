<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

$titulo=$_POST['cad-titulo'];
$prioridade=$_POST['cad-prioridade'];
$descricao=$_POST['cad-descricao'];
$descricao=addslashes($descricao);
$vencimento=$_POST['cad-data-vencimento'];
$inicio=$_POST['cad-data-inicio'];

$data_criacao=date('d-m-Y');
$hora_criacao=date('H:m:s');

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$inserir=mysqli_query($conexao,"insert into planejamentos(planejamento,prioridade,descricao,data,hora,data_vencimento,data_inicio)values('$titulo','$prioridade','$descricao','$data_criacao','$hora_criacao','$vencimento','$inicio')");

if($inserir){ ?>

<script>
	location.href="planejamentos.php"
</script>
	
<?php }else{ ?>
<script>
	location.href="planejamentos.php"
</script>	

<?php } ?>




