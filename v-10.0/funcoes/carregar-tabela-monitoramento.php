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



<div class="col-md-12">

    <div class="table-responsive">

        <table id="example" class="display table">
            <thead>
                <tr>
                    <th style="width:350px">Definição de KPI's</th>
                    <th>Periodicidade</th>
                    <th>Responsável</th>
                    <th style="width:150px">Objetivo atendido?</th>
                    <th style="width:250px">Indicação de necessidade de revisão</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php


                // $selecao2 = mysqli_query($conexao, "select * from responsaveis_workflow WHERE codigo_usuario='$codigo_usuario'");
                // $registros2 = mysqli_fetch_array($selecao2);
                // $codigo_workflow = $registros2['codigo_workflow'];

                $selecao = mysqli_query($conexao, "select * from monitoramento_risco WHERE codigo_matriz_risco='$codigo_matriz'");




                while ($registros = mysqli_fetch_array($selecao)) {
                ?>
                    <tr>

                        <td style="margin-right:50px;text-align:left;padding-left:16px;">

                            <?php echo $registros['definicao_kpis'] ?>
                        </td>

                        <td style="margin-right:40px;text-align:left;padding-left:16px;"><?php echo $registros['periodicidade'] ?></td>


                        <td style="margin-right:90px;text-align:left;padding-left:16px;">
                            <?php echo $registros['responsavel'] ?>
                        </td>
                        <td style="margin-right:40px;text-align:left;padding-left:18px;">
                            <?php echo $registros['objetivo_sim_nao'] ?>
                        </td>
                        <td style="margin-right:20px;text-align:left;padding-left:18px;">
                            <?php echo $registros['necessidade_revisao_sim_nao'] ?>
                        </td>

                        <td>

                            <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirMonitoramento(<?php echo $registros['id'] ?>)"></i>
                        </td>

                    <?php } ?>




                    </tr>



            </tbody>

        </table>



    </div>
</div>

<script>
    // $y = jQuery.noConflict()
    // $y(document).ready(function() {
    //     $y('#example6').DataTable();
    // });



    $y("#example").dataTable({
        "iDisplayLength": 3,
        "bJQueryUI": true,
        "scrollY": 150,
        // stateSave: true,
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