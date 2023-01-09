<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');



$data = $_POST['cad-data-implementacao'];
$item = $_POST['cad-item-implementacao'];
$responsavel =  $_POST['cad-responsavel-monitoramento'];
$status = $_POST['cad-status-monitoramento'];
$descricao = $_POST['cad-descricao-monitoramento'];
$area = $_POST['cad-area-monitoramento'];
$codigo = $_POST['id'];


$inserir = mysqli_query($conexao, "insert into monitoramento_rnc(

data,
item,
responsavel_monitor,
status,
descricao,
area,
codigo_rnc
)values(
'$data',
'$item',
'$responsavel',
'$status',
'$descricao',
'$area',
'$codigo'
)");

if ($inserir) {

?>

  <script>
    alert("Cadastro realizado!")
    location.href = 'cadastro-rnc.php'
  </script>

<?php } else { ?>
  <script>
    alert("Cadastro não pode ser realizado!")
    location.href = 'cadastro-rnc.php'
  </script>

<?php
}
?>