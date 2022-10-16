<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$area = $_POST['area'];
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$selecao2 = mysqli_query($conexao, "select * from responsaveis_areas_temp WHERE codigo_area='$area'");
$num = mysqli_num_rows($selecao2);
if ($num == 0) {



    $gravar = mysqli_query($conexao, "insert into responsaveis_areas_temp(codigo_area)values('$area') ");




    if ($gravar) {


?>
	

<?php } else { ?>
	
	
<?php
    }
}
?>
