<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('menu.php');
include('../' . $obterdominio . '/' . 'conexao.php');

$nav_menu_principal = 'gestaoderisco';
$nav_menu_pagina = 'matrizderiscos';
@$aba = $_REQUEST['aba'];
$codigo_matriz = $_POST['codigo_matriz'];
$setor = $_POST['setor'];
?>

<input type="hidden" id="abas" value="<?php echo $aba; ?>">

<table class="table table-striped mt-2">
    <tr>
        <th class="col-md-1">Id</th>
        <th>Causa</th>

        <th class="col-md-1">Editar</th>
        <th class="col-md-1">Excluir</th>

    </tr>

    <?php
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    $selecao_tabela = mysqli_query($conexao, "select * from matriz_de_risco_causas WHERE codigo_matriz='$codigo_matriz'");
    while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
    ?>

        <tr>
            <td class="col-md-1"><?php echo $registros_tabela['id'] ?></td>
            <td><?php echo $registros_tabela['causa'] ?></td>


            <td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarCausa(<?php echo $registros_tabela['id'] ?>)" data-toggle="modal" data-target="#causaModal">
                    <span class="fa fa-edit"></span></a></td>

            <td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="ExcluirCausa(<?php echo $registros_tabela['id'] ?>)">
                    <span class="fa fa-trash"></span></a></td>
        <?php } ?>
        </tr>



</table>