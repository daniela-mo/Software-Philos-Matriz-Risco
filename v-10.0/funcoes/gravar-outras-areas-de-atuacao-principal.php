
<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$area_principal = $_POST['area'];
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$selecao2 = mysqli_query($conexao, "select * from area_principal_risco WHERE codigo_area='$area_principal'");
$num = mysqli_num_rows($selecao2);
if ($num == 0) {



    $gravar = mysqli_query($conexao, "insert into area_principal_risco(codigo_area)values('$area_principal') ");




    if ($gravar) {


?>


    <?php } else { ?>


<?php
    }
}
?>