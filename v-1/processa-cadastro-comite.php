<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');


$codigo=$_POST['codigo-comite'];
$comite=$_POST['cad-comite'];
$descricao=$_POST['cad-descricao'];
$data_cadastro=date('d-m-Y');




$inserir=mysqli_query($conexao,"insert into comites(codigo_matriz,nome,descricao,data_criacao)values('$codigo','$comite','$descricao','$data_cadastro')");
	
if($inserir){ ?>
	
<script>
	location.href="monitoramento.php?cod=<?php echo $codigo ?>"
</script>	
	
<?php }else{ ?>

<script>
	alert("Cadastro não pode ser realizado")
location.href="monitoramento.php?cod=<?php echo $codigo ?>"
</script>


<?php } ?>
