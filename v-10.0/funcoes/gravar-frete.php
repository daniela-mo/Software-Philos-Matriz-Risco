<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$frete=$_POST['frete'];

 mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into fretes(frete)values('$frete') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
