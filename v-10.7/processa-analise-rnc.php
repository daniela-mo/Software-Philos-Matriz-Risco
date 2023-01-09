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
$descricao = $_POST['cad-descricao-analise'];
$area =  $_POST['cad-area-analise'];
$data = $_POST['cad-data-analise'];
$responsavel_analise = $_POST['cad-responsavel-analise'];
$parecer = $_POST['cad-parecer'];
$objetivo = $_POST['objetivo-analise'];
$necessidade = $_POST['necessidade_revisao_analise'];



$inserir = mysqli_query($conexao, "insert into analise_rnc(

data,
responsavel_analise,
parecer,
area,
objetivo,
necessidade,
descricao
)values(
'$data',
'$responsavel_analise',
'$parecer',
'$area',
'$objetivo',
'$necessidade',
'$descricao'
)");

if ($inserir) {

?>

  <script>
    alert("Cadastro realizado!")
    location.href = 'cadastro-rnc.php'

    location.href = 'cadastro-rnc.php?cod=<?php echo $codigo ?>&aba=analise'
  </script>

<?php } else { ?>
  <script>
    alert("Cadastro não pode ser realizado!")
    // location.href = 'cadastro-rnc.php'
    location.href = 'cadastro-rnc.php?cod=<?php echo $codigo ?>&aba=analise'
  </script>

<?php
}
?>