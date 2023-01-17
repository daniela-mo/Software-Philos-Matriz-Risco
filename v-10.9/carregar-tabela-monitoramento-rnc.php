<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$id = $_REQUEST['codigo'];
?>


<table class="table table-striped mt-5">
    <tr>

        <th class="col-md-2">Descrição do monitoramento</th>
        <th class="col-md-2">Plano de ação</th>
        <th class="col-md-2">Área</th>
        <th class="col-md-2">Responsável Monitoramento</th>
        <th class="col-md-1">Data</th>
        <th class="col-md-1">Status</th>
        <th class="col-md-1">Editar</th>
        <th class="col-md-1">Excluir</th>
    </tr>

    <?php
    $selecao_tabela = mysqli_query($conexao, "select * from monitoramento_rnc where codigo_rnc='$id'");
    while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
    ?>

        <tr>
            <td class="col-md-2"><?php echo $registros_tabela['descricao'] ?></td>
            <td class="col-md-1"><?php echo $registros_tabela['item'] ?></td>
            <td class="col-md-2"><?php echo $registros_tabela['area'] ?></td>
            <td class="col-md-2"><?php echo $registros_tabela['responsavel_monitor'] ?></td>
            <td class="col-md-1"> <?php
                                    $data_id = $registros_tabela['data'];

                                    $ano = substr($data_id, 0, 4);
                                    $mes = substr($data_id, 5, 2);
                                    $dia = substr($data_id, 8, 2);

                                    $data_id = str_replace('-', '/', $data_id);

                                    echo $dia . "/" . $mes . "/" . $ano;

                                    ?></a></td>
            </td>
            <td class="col-md-1"><?php echo $registros_tabela['status'] ?></td>
            <td class="col-md-1"><i class="fa fa-edit pointer" onClick="EditarMonitoramento(<?php echo $registros_tabela['id'] ?>)"></i></td>
            <td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirMonitoramento(<?php echo $registros_tabela['id'] ?>)"></i></td>
        </tr>

    <?php } ?>

</table>