<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');

$descricaoAbrangencia = $_POST['descricaoAbrangencia'];
$descricaoAbrangencia = addslashes($descricaoAbrangencia);
$area_abrangencia = $_POST['area_abrangencia'];
$resposanvel_abrangencia = $_POST['resposanvel_abrangencia'];

$id = $_POST['id'];



mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$gravar = mysqli_query($conexao, "insert into detalhe_abrangencia(descricao,id_registro,area,responsavel)values('$descricaoAbrangencia','$id','$area_abrangencia','$resposanvel_abrangencia')");


if ($gravar) { ?>

    <script>
        location.href = 'cadastro-rnc.php?cod=<?php echo $id ?>&aba=registro'
    </script>

<?php } else { ?>

<?php
}
?>