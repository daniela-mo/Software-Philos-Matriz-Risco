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
$data = $_POST['cad-data'];
$planta = $_POST['cad-empresa'];
$parceiro =  $_POST['cad-parceiro'];
$origem = $_POST['cad-origem'];
$processo = $_POST['cad-processo'];
$risco = $_POST['cad-risco'];
$area = $_POST['cad-area-nconformidade'];
$planta = $_POST['cad-responsavel-nconformidade'];





$inserir = mysqli_query($conexao, "insert into rnc(

data,
processo,
risco,
origem,
parceiro,
planta_reg_nao_conformidade,
area_reg_nao_conformidade,
codigo

)values(
  

'$data',
'$processo',
'$risco',
'$origem',
'$parceiro',
'$planta',
'$area',
'$codigo'

)");

if ($inserir) {

?>

  <script>
    location.href = 'rncs.php'
  </script>

<?php } else { ?>
  <script>
    alert("Cadastro não pode ser realizado!")
    location.href = 'rncs.php'
  </script>

<?php
}
?>