<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>


<table class="table table-striped mt-5">
    <tr>
        <th class="col-md-2">Descrição</th>
        <th class="col-md-2">Responsável</th>
        <th class="col-md-2">Área</th>
        <th class="col-md-1">Início</th>
        <th class="col-md-1">Término</th>
        <th class="col-md-1">Prioridade</th>
        <th class="col-md-1">Status</th>
        <th class="col-md-1">Editar</th>
        <th class="col-md-1">Excluir</th>
    </tr>

    <?php
    $selecao_tabela = mysqli_query($conexao, "select * from tabela_plano_de_acao where codigo_rnc='$codigo_rnc'");
    while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
    ?>

        <tr>
            <td class="col-md-2"><?php echo $registros_tabela['descricao'] ?></td>
            <td class="col-md-2"><?php echo $registros_tabela['responsavel'] ?></td>
            <td class="col-md-2"><?php echo $registros_tabela['area'] ?></td>
            <td class="col-md-1"><?php
                                    $data_id = $registros_tabela['data_prevista_conclusao'];

                                    $ano = substr($data_id, 0, 4);
                                    $mes = substr($data_id, 5, 2);
                                    $dia = substr($data_id, 8, 2);

                                    $data_id = str_replace('-', '/', $data_id);

                                    echo $dia . "/" . $mes . "/" . $ano;

                                    ?></td>
            <td class="col-md-1"><?php
                                    $data_id = $registros_tabela['data_conclusao'];

                                    $ano = substr($data_id, 0, 4);
                                    $mes = substr($data_id, 5, 2);
                                    $dia = substr($data_id, 8, 2);

                                    $data_id = str_replace('-', '/', $data_id);

                                    echo $dia . "/" . $mes . "/" . $ano;

                                    ?></td>
            <td class="col-md-1"><?php echo $registros_tabela['prioridade'] ?></td>
            <td class="col-md-1"><?php echo $registros_tabela['status'] ?></td>
            <td class="col-md-1"><i class="fa fa-edit pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td>
            <td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td>
        </tr>

    <?php } ?>

</table>