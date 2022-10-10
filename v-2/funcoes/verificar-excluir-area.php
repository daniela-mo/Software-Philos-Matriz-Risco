<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');

$codigo=$_POST['codigo'];

$verificar=mysqli_query($conexao,"select * from areas WHERE id='$codigo'");
$registros=mysqli_fetch_array($verificar);
$area_raiz=$registros['codigo_area_mae'];

if($area_raiz==0){ ?>

<?php echo "0" ?>

<?php }else{?>

<?php echo $codigo;

} ?>