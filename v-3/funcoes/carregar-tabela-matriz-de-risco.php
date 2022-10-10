<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$codigo_matriz = $_POST['codigo_matriz'];
$codigo_usuario = $_POST['usuario'];
?>



<table id="example" class="display mt-4" style="width:100%">
    <thead>
        <tr>
            <th class="w-25">Desc. Evento de Risco</th>
            <th>Planejamento</th>
            <th>Prioridade</th>
            <th>Inicio</th>
            <th>Término</th>
            <th>Status</th>
            <th>Responsável</th>
            <th>Risco Inerente</th>
            <th>Risco Residual</th>
            <th>Risco Futuro</th>
            <th>Ação</th>

        </tr>
    </thead>
    <tbody>
        <?php


        $selecao2 = mysqli_query($conexao, "select * from responsaveis_workflow WHERE codigo_usuario='$codigo_usuario'");
        $registros2 = mysqli_fetch_array($selecao2);
        $codigo_workflow = $registros2['codigo_workflow'];

        $selecao = mysqli_query($conexao, "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz'");




        while ($registros = mysqli_fetch_array($selecao)) {
        ?>
            <tr>


                <td class="w-25">
                    <?php
                    $selecao_risco = mysqli_query($conexao, "select * from identificacao_do_risco where id='$codigo_matriz'");
                    while ($registros_matriz = mysqli_fetch_array($selecao_risco)) {
                        $evento_risco = $registros_matriz['evento_risco'];
                        $codigo = $registros_matriz['id'] ?>
                        <a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                            <?php echo $registros_matriz['evento_risco'] ?></a>
                </td>
            <?php } ?>
            <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planejamento'] ?></a></td>

            <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['prioridade'] ?></a></td>

            <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                    <?php $registros['data_inicio'];

                    $data_inicio = $registros['data_inicio'];

                    $ano_min = substr($data_inicio, 0, 4);
                    $mes_min = substr($data_inicio, 5, 2);
                    $dia_min = substr($data_inicio, 8, 2);

                    echo  @$data_inicio = $dia_min . "/" . $mes_min . "/" . $ano_min;



                    ?>




                </a></td>

            <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php

                                                                                                            @$data_max = $data_inicio = $registros['data_vencimento'];
                                                                                                            $ano_max = substr($data_max, 0, 4);
                                                                                                            $mes_max = substr($data_max, 5, 2);
                                                                                                            $dia_max = substr($data_max, 8, 2);

                                                                                                            echo @$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;







                                                                                                            ?></a></td>

            <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                    <?php echo $registros['status'] ?>
                </a></td>



            <td><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                    <?php echo $registros['responProc'] ?>
                </a></td>

            <td>
                <?php
                $selecao_inerente = mysqli_query($conexao, "select * from avaliacao_risco_inerente where codigo_matriz='$codigo_matriz'");
                while ($registros_inerentes = mysqli_fetch_array($selecao_inerente)) {
                    $nivel_risco = $registros_inerentes['nivel'];
                    $codigo = $registros_inerentes['id'] ?>
                    <a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_inerentes['id'] ?>">
                        <?php echo $registros_inerentes['nivel'] ?></a>
            </td>
        <?php } ?>

        <td>
            <?php
            $selecao_residual = mysqli_query($conexao, "select * from avaliacao_risco_residual where codigo_matriz='$codigo_matriz'");
            while ($registros_residual = mysqli_fetch_array($selecao_residual)) {
                $nivel_risco = $registros_residual['nivel'];
                $codigo = $registros_residual['id'] ?>
                <a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_residual['id'] ?>">
                    <?php echo $registros_residual['nivel'] ?></a>
        </td>
    <?php } ?>

    <td>
        <?php
            $selecao_futuro = mysqli_query($conexao, "select * from avaliacao_risco_futuro where codigo_matriz='$codigo_matriz'");
            while ($registros_futuro = mysqli_fetch_array($selecao_futuro)) {
                $nivel_risco = $registros_futuro['nivel'];
                $codigo = $registros_futuro['id'] ?>
            <a class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_futuro['id'] ?>">
                <?php echo $registros_futuro['nivel'] ?></a>
    </td>
<?php } ?>


<td>



    <a class="text-dark" onClick="Excluir(<?php echo $registros['id']; ?>)">
        <i class="fa fa-trash" style="cursor: pointer"></i></a>


</td>

            </tr>

        <?php } ?>

    </tbody>

</table>

<script>
    $y = jQuery.noConflict()
    $y(document).ready(function() {
        $y('#example').DataTable();
    });



    $y("#example").dataTable({
        "bJQueryUI": true,
        "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }
        }
    })
</script>