<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];
$banco=$_POST['banco'];
	
	
$excluir=mysqli_query($conexao,"delete  from $banco WHERE codigo_usuario='$codigo'");


if($excluir){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
