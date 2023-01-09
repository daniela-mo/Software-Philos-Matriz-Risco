<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');





$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$nome = addslashes($nome);
$objetivo = $_POST['objetivo'];
$objetivo = addslashes($objetivo);
$numero = $_POST['numero'];
$numero = addslashes($numero);


// $seleco = mysqli_query($conexao, "select * from identificacao_do_risco order by id DESC");
// $registr = mysqli_fetch_array($seleco);
// $codigoa = $registr['codigo'];
// $codigoa = $codigoa + 1;





mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$gravar = mysqli_query($conexao, "insert into controles_existentes_tratamento(nome_controle,objetivo_controle,numero_controle,codigo_matriz_risco)values('$nome','$objetivo','$numero','$codigo')");


if ($gravar) { ?>
	

<?php } else { ?>
	
	
<?php
}
?>
