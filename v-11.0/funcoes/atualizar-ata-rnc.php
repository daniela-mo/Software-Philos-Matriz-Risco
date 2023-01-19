<script>
    alert('entrando na funcao de editar')
</script>


<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$ata_rnc = $_POST['ata_rnc'];
$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

$atualizar = mysqli_query($conexao, "update rnc set ata='$ata_rnc' WHERE id='$codigo'");
if ($atualizar) { ?>


<?php } else { ?>


<?php }

?>