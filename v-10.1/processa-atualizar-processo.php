<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

$codigo=$_POST['codigo'];
$data=$_POST['cad-data'];
$area=$_POST['cad-area'];
$processo=$_POST['cad-processo'];
$descricao=$_POST['cad-descricao'];
$descricao=addslashes($descricao);
$aplicacao=$_POST['cad-aplicacao'];


mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
    
    
$atualizar=mysqli_query($conexao,"update processos set data='$data',
area='$area',
processo='$processo',
descricao='$descricao',
aplicacao='$aplicacao'

WHERE id='$codigo';

")   ; 
    

if($atualizar){ ?>

<script>
location.href='processos'
</script>

<?php }else{ ?>

<script>
alert("Cadastro não pode ser realizado")	
location.href='processos'
</script>

<?php } ?>

