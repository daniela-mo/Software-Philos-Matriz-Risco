<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$id = $_POST['id'];
$codigo = $_POST['id'];
$data = $_POST['cad-data-implementacao'];
$item = $_POST['cad-item-implementacao'];
$responsavel =  $_POST['cad-responsavel-monitoramento'];
$status = $_POST['cad-status-monitoramento'];







$inserir = mysqli_query($conexao, "insert into monitoramento_rnc(

data,
item,
responsavel_monitor,
status

)values(
  
'$data',
'$item',
'$responsavel',
'$status'
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