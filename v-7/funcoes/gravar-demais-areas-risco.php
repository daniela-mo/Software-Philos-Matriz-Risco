
<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$area_outras = $_POST['area'];
// $codigo = $_POST['codigo'];
$area = $_POST['titulo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$seleco = mysqli_query($conexao, "select * from identificacao_do_risco order by id DESC");
$registr = mysqli_fetch_array($seleco);
$codigo = $registr['id'];
$codigo = $codigo + 1;


$selecao_area = mysqli_query($conexao, "select * from areas WHERE id='$area_outras'");
$registros_area = mysqli_fetch_array($selecao_area);
$nome_area = $registros_area['area'];


// $selecao2 = mysqli_query($conexao, "select * from demais_areas_risco WHERE codigo_area='$area_outras'");
// $num = mysqli_num_rows($selecao2);
// if ($num == 0) {



$gravar = mysqli_query($conexao, "insert into demais_areas_risco(codigo_area,codigo_matriz_risco,area,status)values('$area_outras','$codigo','$nome_area','1') ");




if ($gravar) {


?>


    <?php } else { ?>


<?php
}
// }
?>