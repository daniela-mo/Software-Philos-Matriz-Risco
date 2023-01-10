<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from contextos WHERE id='$codigo'");

$excluir2= mysqli_query($conexao,"delete  from tabela_fatores_internos WHERE codigo_contexto='$codigo'");

$excluir3= mysqli_query($conexao,"delete  from tabela_fatores_externos WHERE codigo_contexto='$codigo'");

if($excluir){ ?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
