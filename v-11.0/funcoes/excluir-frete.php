<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_frete=$_POST['frete'];

$excluir=mysqli_query($conexao,"delete  from fretes WHERE id='$codigo_frete'");


if($excluir){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
