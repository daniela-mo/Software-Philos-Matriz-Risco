<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$codigo_matriz = $_POST['codigo_matriz'];
// $codigo_usuario = $_POST['usuario'];
?>



<table id="example3" class="display table h-25" style="width:100%">
    <thead>
        <tr>
            <th>Definição de Kpi's</th>
            <th>Periodicidade</th>
            <th>Responsável</th>
            <th>Objetivo atendido?</th>
            <th>Indicicação de necessidade de revisão</th>

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
            <tr class="h-25">

                <td style="padding-left:50px;">

                    <?php echo $registros['definicao_kpis'] ?>
                </td>



                <td style="padding-left:50px;"><?php echo $registros['periodicidade'] ?></td>


                <td style="padding-left:50px;">
                    <?php echo $registros['responsavel'] ?>
                </td>
                <td style="padding-left:50px;">
                    <?php echo $registros['objetivo_sim_nao'] ?>
                </td>
                <td style="padding-left:50px;">
                    <?php echo $registros['necessidade_revisao_sim_nao'] ?>
                </td>

            <?php } ?>




            </tr>



    </tbody>

</table>

<script>
    $y = jQuery.noConflict()
    $y(document).ready(function() {
        $y('#example3').DataTable();
    });



    $y("#example3").dataTable({
        "iDisplayLength": 1000,
        "bJQueryUI": true,
        "scrollY": 100,
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