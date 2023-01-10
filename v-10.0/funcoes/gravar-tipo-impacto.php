<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$item=$_POST['item'];
$descricao=$_POST['descricao'];
$baixa=$_POST['baixa'];
$media=$_POST['media'];
$alta=$_POST['alta'];
$malta=$_POST['malta'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$selecao=mysqli_query($conexao,"select * from tipo_impacto WHERE item='$item'");
$numero=mysqli_num_rows($selecao);
if($numero>=1){?>

<script>
	alert("Esse Item já existe!")
	location.href="parametrizacao.php"
</script>
	
<?php }else{
	

$gravar=mysqli_query($conexao,"insert into tipo_impacto(item,descricao,baixa,media,alta,malta)values('$item','$descricao','$baixa','$media','$alta','$malta') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}}
?>
