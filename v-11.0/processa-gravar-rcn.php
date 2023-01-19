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
$area_nao_conformidade = $_POST['cad-area-nconformidade'];
$area_responsavel = $_POST['cad-area-responsavel'];
$responsavel = $_POST['cad-responsavel-nconformidade'];
$ata_comite = $_POST['cad-ata-comite'];





$inserir = mysqli_query($conexao, "insert into rnc(

data,
processo,
risco,
origem,
parceiro,
planta_reg_nao_conformidade,
area_reg_nao_conformidade,
codigo,
responsavel_rnc,
area_responsavel,
ata

)values(
  

'$data',
'$processo',
'$risco',
'$origem',
'$parceiro',
'$planta',
'$area_nao_conformidade ',
'$codigo',
'$responsavel',
'$area_responsavel',
'$ata_comite'

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