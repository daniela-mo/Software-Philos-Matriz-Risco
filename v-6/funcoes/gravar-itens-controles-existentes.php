<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');





$codigo = $_POST['codigo'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$seleco = mysqli_query($conexao, "select * from identificacao_do_risco order by id DESC");
$registr = mysqli_fetch_array($seleco);
$codigoa = $registr['codigo'];
$codigoa = $codigoa + 1;





$nome = $_POST['nome'];
$objetivo = $_POST['objetivo'];
$numero = $_POST['numero'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$gravar = mysqli_query($conexao, "insert into controles_existentes_tratamento(nome_controle,objetivo_controle,numero_controle,codigo_matriz_risco)values('$nome','$objetivo','$numero','$codigoa') ");


if ($gravar) { ?>
	

<?php } else { ?>
	
	
<?php
}
?>
