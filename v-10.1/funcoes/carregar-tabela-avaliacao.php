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

<div class="table-responsive">

    <table id="example2" class="display mt-8" style="width:100%">
        <thead>
            <tr>
                <th>Risco Inerente</th>
                <th>Risco Residua</th>
                <th>Risco Futuro</th>
            </tr>
        </thead>
        <tbody>




        </tbody>

    </table>
</div>

</table>

<script>
    $y = jQuery.noConflict()
    $y(document).ready(function() {
        $y('#example2').DataTable();
    });



    $y("#example2").dataTable({
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