
<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$codigo_qaa_risco = $_POST['titulo'];
$codigo = $_POST['codigo'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$seleco = mysqli_query($conexao, "select * from identificacao_do_risco order by id DESC");
$registr = mysqli_fetch_array($seleco);
$codigoa = $registr['codigo'];
$codigoa = $codigoa + 1;


// $selecao2 = mysqli_query($conexao, "select * from item_qaa_risco WHERE criterio_correspondente='$codigo_qaa_risco'");
// $num = mysqli_num_rows($selecao2);
// if ($num == 0) {



$gravar = mysqli_query($conexao, "insert into item_qaa_risco(criterio_correspondente,codigo_matriz_risco,status)values('$codigo_qaa_risco','$codigoa','1') ");




if ($gravar) {


?>


    <?php } else { ?>


<?php
}
// }
?>