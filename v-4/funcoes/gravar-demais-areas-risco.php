
<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$area_outras = $_POST['area'];
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$selecao2 = mysqli_query($conexao, "select * from demais_areas_risco WHERE codigo_area='$area_outras'");
$num = mysqli_num_rows($selecao2);
if ($num == 0) {



    $gravar = mysqli_query($conexao, "insert into demais_areas_risco(codigo_area)values('$area_outras') ");




    if ($gravar) {


?>


    <?php } else { ?>


<?php
    }
}
?>