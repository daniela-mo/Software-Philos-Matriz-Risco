<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;



$data_analise = $_POST['data_analise'];
$responsavel_analise = $_POST['responsavel_analise'];
$parecer = $_POST['parecer'];
$area_analise =  $_POST['area_analise'];
$objetivo = $_POST['objetivo'];
$necessidade = $_POST['necessidade'];
$descricaoAnalise = $_POST['descricaoAnalise'];
$id = $_REQUEST['codigo'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$inserir = mysqli_query($conexao, "insert into analise_rnc(data,responsavel_analise,parecer,area,objetivo,necessidade,descricao,codigo_rnc)values('$data_analise','$responsavel_analise','$parecer','$area_analise','$objetivo','$necessidade','$descricaoAnalise','$id')");

if ($inserir) {

?>

  <script>
    alert("Cadastro realizado!")

    location.href = 'rnc.php?cod=<?php echo $id ?>&aba=analise'
  </script>

<?php } else { ?>
  <script>
    alert("Cadastro não pode ser realizado!")

    location.href = 'rnc.php?cod=<?php echo $id ?>&aba=analise'
  </script>

<?php
}
?>