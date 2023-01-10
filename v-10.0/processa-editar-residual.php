<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$codigo = $_POST['codigo_matriz'];
$probabilidade = $_POST['cad-probabilidade-residual'];
$impacto = $_POST['cad-impacto-residual'];



$nivel = $_POST['cad-nivel-do-risco-residual'];
$decisao = $_POST['cad-decisao-avaliacao'];
$classif_risco = $_POST['classif_risco'];
$data = date("Y-m-d");

$atualizar = mysqli_query($conexao, "update avaliacao_risco_residual set 
codigo_classificacao_risco = '$classif_risco',
codigo_matriz='$codigo',
probabilidade= '$probabilidade',
impacto = '$impacto',
nivel = '$nivel',
decisao = '$decisao',
data = '$data'

WHERE codigo_matriz='$codigo'
");

if ($atualizar) { ?>

	<script>
		location.href = "matriz-de-risco.php?cod=<?php echo $impacto ?>&aba=avaliacao"
	</script>

<?php } else { ?>

	<script>
		alert('Risco não pode ser Atualizado!')
		location.href = "matriz-de-risco.php?cod=<?php echo $impacto ?>&aba=avaliacao"
	</script>


<?php }





?>