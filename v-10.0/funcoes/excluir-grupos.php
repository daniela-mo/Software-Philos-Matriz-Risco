<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_grupo=$_POST['grupo'];

$excluir=mysqli_query($conexao,"delete  from grupos WHERE id='$codigo_grupo'");


if($excluir){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
