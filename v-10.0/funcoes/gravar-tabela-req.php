<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$numero=$_POST['numero'];
$subnumero=$_POST['subnumero'];
$requisito=$_POST['requisito'];


            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$gravar=mysqli_query($conexao,"insert into tabela_requisitos_normativos(numero,subnumero,requisito)values('$numero','$subnumero','$requisito') ");


if($gravar){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
