
<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$area_outras = $_POST['area'];
// $codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$seleco = mysqli_query($conexao, "select * from identificacao_do_risco order by id DESC");
$registr = mysqli_fetch_array($seleco);
$codigoa = $registr['codigo'];
$codigoa = $codigoa + 1;


// $selecao2 = mysqli_query($conexao, "select * from area_principal_risco WHERE codigo_area='$area_outras'");
// $num = mysqli_num_rows($selecao2);
// if ($num == 0) {



$gravar = mysqli_query($conexao, "insert into area_principal_risco(codigo_area,codigo_matriz_risco,status)values('$area_outras','$codigoa','1') ");




if ($gravar) {


?>


    <?php } else { ?>


<?php
}
// }
?>