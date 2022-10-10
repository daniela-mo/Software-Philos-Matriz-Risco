<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_ata=$_POST['codigo'];
$atividade=$_POST['atividade'];
$codigo_assunto=$_POST['assunto'];
$data_prevista=$_POST['data_prevista'];
$status=$_POST['status'];
$responsavel=$_POST['responsavel'];

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$gravar=mysqli_query($conexao,"insert into comites_tratamentos(codigo_ata,atividade,codigo_assunto,data_prevista,status,responsavel)values('$codigo_ata','$atividade','$codigo_assunto','$data_prevista','$status','$responsavel')");



if($gravar){ 


?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
