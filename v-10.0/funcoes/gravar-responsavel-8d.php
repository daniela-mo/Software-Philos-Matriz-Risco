<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$area=$_POST['area'];
$responsavel=$_POST['responsavel'];

 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into 8d_equipe_responsavel_temp(responsavel,area)values('$responsavel','$area') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
