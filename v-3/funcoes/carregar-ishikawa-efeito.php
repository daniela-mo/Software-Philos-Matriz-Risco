<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
$codigo = $_POST['codigo'];
$codigo_matriz = $_POST['codigo_matriz'];
$setor = $_POST['setor'];
?>

<table class="table table-striped mt-2">
    <tr>
        <th>ID</th>
        <th>EFEITO</th>
        <th></th>
    </tr>

    <?php
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    $selecao_tabela = mysqli_query($conexao, "select * from diagrama_ishikawa_efeitos WHERE codigo_matriz='$codigo_matriz' ");
    while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
    ?>

        <tr>
            <td><?php echo $registros_tabela['id'] ?></td>
            <td style="width:600px"><?php echo $registros_tabela['efeito'] ?></td>


            <td class="col-md-1"><a class="pointer" onClick="ExcluirEfeito(<?php echo $registros_tabela['id'] ?>)">
                    <span class="fa fa-trash"></span></a></td>
        </tr>

    <?php } ?>

</table>