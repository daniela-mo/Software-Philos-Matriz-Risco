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
$data = $_POST['cad-data-analise'];
$responsavel_analise =  $_POST['cad-responsavel-analise'];
$parecer = $_POST['cad-parecer'];








$inserir = mysqli_query($conexao, "insert into analise_rnc(

data,
responsavel_analise,
parecer

)values(
  
'$data',
'$responsavel_analise',
'$parecer'
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