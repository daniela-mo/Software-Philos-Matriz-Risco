<?php

session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;


$numero_pergunta = $_POST['cad-numero-pergunta'];
$pergunta = $_POST['cad-pergunta'];
$upload_sim = $_POST['cad-upload-sim'];
$upload_nao = $_POST['cad-upload-nao'];
$mensagem_sim=$_POST['cad-mensagem-sim'];
$mensagem_nao=$_POST['cad-mensagem-nao'];

$categoria_sim = $_POST['cad-categoria-sim'];
$categoria_nao = $_POST['cad-categoria-nao'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$inserir=mysqli_query($conexao,"insert into qaa(numero,pergunta,upload_sim,upload_nao,mensagem_sim,mensagem_nao,categoria_nao,categoria_sim)values('$numero_pergunta','$pergunta','$upload_sim','$upload_nao','$mensagem_sim','$mensagem_nao','$categoria_nao','$categoria_sim')");
if($inserir){?>
	
<script>
	location.href='qaa.php'
</script>	
	
<?php }else{?>
	
<script>
	location.href='qaa.php'
</script>		
	
<?php } ?>