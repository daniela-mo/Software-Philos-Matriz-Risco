<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');;

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


$verifica=mysqli_query($conexao,"select * from processos WHERE processo='$processo'");
$num=mysqli_num_rows($verifica);

if($num==0){

$inserir=mysqli_query($conexao,"insert into processos(
data,
area,
processo,
descricao,
aplicacao


)values(

'$data',
'$area',
'$processo',
'$descricao',
'$aplicacao'

)");
if($inserir){ ?>

<script>
location.href='processos'
</script>

<?php }else{ ?>

<script>
alert("Cadastro não pode ser realizado")	
location.href='processos'
</script>

<?php }}else{ ?>


<script>
alert("Processo ja cadastrado!")	
location.href='processos'
</script>


<?php } ?>
