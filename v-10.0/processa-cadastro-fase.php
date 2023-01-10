<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


$codigo=$_POST['codigo-fase'];
$titulo=$_POST['cad-titulo'];
$descricao=$_POST['cad-descricao'];
$descricao=addslashes($descricao);
$data_criacao=date('d-m-Y');
$hora_criacao=date('H:m:s');

$data_inicio=$_POST['cad-data-inicio'];
$data_termino=$_POST['cad-data-termino'];

$inserir=mysqli_query($conexao,"insert into fases(fase,descricao,data,hora,codigo_planejamento,data_inicio,data_termino)values('$titulo','$descricao','$data_criacao','$hora_criacao','$codigo','$data_inicio','$data_termino')");

if($inserir){ ?>

<script>
	location.href="planejamento.php?cod=<?php echo $codigo ?>"
</script>
	
<?php }else{ ?>
<script>
	location.href="planejamento.php?cod=<?php echo $codigo ?>"
</script>	

<?php } ?>




?>

