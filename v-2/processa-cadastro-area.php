<?php
	session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/conexao.php');

$area=$_POST['cad-area'];
$codigo_area_mae=$_POST['cad-codigo-area-mae'];
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$verifica=mysqli_query($conexao,"select * from areas WHERE area='$area'");
$num=mysqli_num_rows($verifica);

if($num==0){


$inserir=mysqli_query($conexao,"insert into areas(
area,
codigo_area_mae

)values(

'$area',
'$codigo_area_mae'

)");
if($inserir){ ?>





<script>
	location.href="areas.php"
</script>


	
	
<?php }else{  ?>

<script>
	alert("Cadastro não pode ser realizado")
	location.href="areas.php"
</script>


<?php }}else{?>

<script>
	alert("Área já cadastrada!")
	location.href="areas.php"
</script>



<?php } ?>


