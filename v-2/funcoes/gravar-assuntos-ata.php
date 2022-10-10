<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo_ata=$_POST['codigo'];
$assunto=$_POST['assunto'];
$risco_associado=$_POST['risco_associado'];
$anexo=$_POST['anexo'];
$descricao=$_POST['descricao'];
$descricao = addslashes($descricao);
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$gravar=mysqli_query($conexao,"insert into comites_assuntos(codigo_ata,assunto,risco_associado,anexo,descricao)values('$codigo_ata','$assunto','$risco_associado','$anexo','$descricao')");



if($gravar){ 


?>
	

<?php }else{ ?>
	
	
<?php	
}
?>
