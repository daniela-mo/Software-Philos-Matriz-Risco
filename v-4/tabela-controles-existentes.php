<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;
?>


<table id="example3" class="display mb-2" style="width:100%">
    <thead>
        <tr>
            <th>Nome Controle</th>
            <th>Objetivo</th>
            <th>Cadastro</th>
            <th>Parecer</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        mysqli_query($conexao, "SET NAMES 'utf8'");
        mysqli_query($conexao, 'SET character_set_connection=utf8');
        mysqli_query($conexao, 'SET character_set_client=utf8');
        mysqli_query($conexao, 'SET character_set_results=utf8');
        $selecao = mysqli_query($conexao, "select * from controles_existentes_temp");
        while ($registros = mysqli_fetch_array($selecao)) {
        ?>
            <tr>
                <td><?php echo $registros['nome_controle'] ?></td>
                <td><?php echo $registros['objetivo_controle'] ?></td>
                <td><?php echo $registros['cadastro_tipo'] ?></td>
                <td><?php echo $registros['parecer_controle'] ?></td>

                <td>
                    <i class=" fa fa-edit" style="cursor: pointer" onClick="EditarControlesExistentes(<?php echo $registros['id'] ?>)" data-toggle="modal" data-target="#ModalEditarControles"></i>

                    <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirControlesExistentes(<?php echo $registros['id'] ?>)"></i>
                </td>
            </tr>

        <?php } ?>

    </tbody>

</table>

<script>
    $var = jQuery.noConflict()

    $var(document).ready(function() {
        $var('#example').DataTable();
        $var('#example3').DataTable();
    });

    $var("#example3").dataTable({
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