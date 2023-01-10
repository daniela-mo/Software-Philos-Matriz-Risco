<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
$codigo = $_POST['codigo'];
?>
<link rel="stylesheet" type="text/css" href="../css/datatable.css">



<table id="tabela-cronogramas" class="display" style="width:100%">
    <thead>
        <tr>
            <th>N°</th>
            <th>Tipo Reunião</th>
            <th>Data Prevista</th>
            <th>Horário Previsto</th>
            <th>Realizado em</th>
            <th>Horário Realizado</th>
            <th>Duração</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php

        mysqli_query($conexao, "SET NAMES 'utf8'");
        mysqli_query($conexao, 'SET character_set_connection=utf8');
        mysqli_query($conexao, 'SET character_set_client=utf8');
        mysqli_query($conexao, 'SET character_set_results=utf8');
        $selecao = mysqli_query($conexao, "select * from comites_cronogramas WHERE codigo_comite='$codigo'");
        while ($registros = mysqli_fetch_array($selecao)) {
        ?>
            <tr>
                <td><?php echo $registros['id'] ?></td>

                <td><?php echo $registros['tipo_reuniao'] ?></td>

                <td><?php echo $registros['data_prevista'] ?></td>

                <td><?php echo $registros['horario_previsto'] ?></td>

                <td><?php echo $registros['realizado_em'] ?></td>

                <td><?php echo $registros['horario_realizado'] ?></td>

                <td><?php echo $registros['duracao'] ?></td>

                <td>

                    <i class="fa fa-edit" style="cursor: pointer" data-toggle="modal" data-target="#ModalEditarCronogramas" onClick="EditarModalCronogramas(<?php echo $registros['id'] ?>)"></i>


                    <a class="text-dark" onClick="ExcluirCronogramas(<?php echo $registros['id']; ?>)">
                        <i class="fa fa-trash" style="cursor: pointer"></i></a>

                </td>

            </tr>

        <?php } ?>

    </tbody>

</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


<script>
    $bb = jQuery.noConflict()

    $bb(document).ready(function() {








    });

    $bb("#tabela-cronogramas").dataTable({
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