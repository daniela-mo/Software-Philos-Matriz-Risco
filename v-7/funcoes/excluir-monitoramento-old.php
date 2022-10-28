<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$excluir=mysqli_query($conexao,"delete  from comites WHERE id='$codigo'");


if($excluir){ 

$selecao=mysqli_query($conexao,"select * from comites_atas WHERE cod_comite='$codigo'");
$registros=mysqli_fetch_array($selecao);
$codigo_ata=$registros['id'];	
	
$excluir=mysqli_query($conexao,"delete  from comites_atas WHERE codigo_comite='$codigo'");
$excluir=mysqli_query($conexao,"delete  from comites_participantes WHERE codigo_comite='$codigo'");
$excluir=mysqli_query($conexao,"delete  from comites_tratamentos WHERE codigo_ata='$codigo_ata'");	
$excluir=mysqli_query($conexao,"delete  from comites_assuntos WHERE codigo_ata='$codigo_ata'");		
?>




<?php }else{ ?>
	
	
<?php	
}
?>
