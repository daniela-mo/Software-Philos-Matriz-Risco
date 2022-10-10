<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$causa=$_POST['causa'];
$setor=$_POST['setor'];

 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into matriz_de_risco_causas(causa,setor)values('$causa','$setor') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
