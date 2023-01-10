<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;



$codigo_matriz = $_POST['codigo'];
?>


<table id="examplecontrole" class="display mb-2" style="width:100%">
    <thead>
        <tr>
            <th style="text-align:left;">Tratamento</th>
            <th style="text-align:left;">Controles</th>
            <th style="text-align:left;">Número do procedimento associado ao processo de trabalho envolvido</th>
            <th style="text-align:center;">Editar</th>
            <th style="text-align:center;">Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        mysqli_query($conexao, "SET NAMES 'utf8'");
        mysqli_query($conexao, 'SET character_set_connection=utf8');
        mysqli_query($conexao, 'SET character_set_client=utf8');
        mysqli_query($conexao, 'SET character_set_results=utf8');
        $selecao = mysqli_query($conexao, "select * from controles_existentes_tratamento WHERE codigo_matriz_risco='$codigo_matriz'");
        while ($registros = mysqli_fetch_array($selecao)) {

        ?>
            <tr>
                <td style="text-align:left;padding-left:20px;"><?php echo $registros['nome_controle'] ?></td>
                <td style="text-align:left;padding-left:20px;"><?php echo $registros['objetivo_controle'] ?></td>
                <td style="text-align:left;padding-left:20px;"><?php echo $registros['numero_controle'] ?></td>



                <td style="text-align:center;">
                    <i class=" fa fa-edit" style="cursor: pointer" onClick="EditarControlesExistentes(<?php echo $registros['id'] ?>)" data-toggle="modal" data-target="#ModalEditarControles"></i>
                </td>
                <td style="text-align:center;">
                    <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirControlesExistentes(<?php echo $registros['id'] ?>)"></i>
                </td>


                <td>

                </td>
            </tr>

        <?php } ?>

    </tbody>

</table>


<script>
    $y = jQuery.noConflict()
    $y(document).ready(function() {
        $y('#examplecontrole').DataTable();
    });



    $y("#examplecontrole").dataTable({
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