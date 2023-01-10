<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/conexao.php');

$area = $_POST['cad-area'];


$codigo_area_mae = $_POST['cad-codigo-area-mae'];
$codigo_empresa = $_POST['empresa'];
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');




$inserir = mysqli_query($conexao, "insert into areas(
area,
codigo_area_mae,
codigo_empresa

)values(

'$area',
'$codigo_area_mae',
'$codigo_empresa'

)");
if ($inserir) {

	$inserir_ligacao = mysqli_query($conexao, "insert into organogramas(cod_empresa)values('$codigo_empresa')");



?>





	<script>
		location.href = "organogramas.php"
	</script>




<?php } else {  ?>

	<script>
		alert("Cadastro não pode ser realizado")
		location.href = "organogramas.php"
	</script>


<?php }
