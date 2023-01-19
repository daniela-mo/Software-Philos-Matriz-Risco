<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;


$dataMonitor = $_POST['dataMonitor'];
$planoAcao = $_POST['planoAcao'];
$responsavelMonitor =  $_POST['responsavelMonitor'];
$statusMonitor = $_POST['statusMonitor'];
$descricaoMonitor = $_POST['descricaoMonitor'];
$areaMonitoramento = $_POST['areaMonitoramento'];
$id = $_REQUEST['codigo'];


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$inserir = mysqli_query($conexao, "insert into monitoramento_rnc(

data,
item,
responsavel_monitor,
status,
descricao,
codigo_rnc,
area
)values(
'$dataMonitor',
'$planoAcao',
'$responsavelMonitor',
'$statusMonitor',
'$descricaoMonitor',
'$id',
'$areaMonitoramento'

)");

if ($inserir) {

?>

  <script>
    // alert("Cadastro realizado!")
    location.href = 'rnc.php?cod=<?php echo $id ?>&aba=monitoramento'
  </script>

<?php } else { ?>
  <script>
    // alert("Cadastro não pode ser realizado!")
    location.href = 'rnc.php?cod=<?php echo $id ?>&aba=monitoramento'
  </script>

<?php
}
?>