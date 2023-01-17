<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');;



$codigo_matriz = $_POST['codigo'];
?>

<form method="POST" class="d-flex w-100">


    <select name="filter_status" id="filter_status" class="form-control mr-3">
        <option value="">Selecione o Status</option>
        <option value="aberto">Aberto</option>
        <option value="concluido">Concluído</option>
        <option value="andamento">Em andamento</option>
        <option value="niniciado">Não iniciado</option>
    </select>

    <select name="filter_risco" id="filter_risco" class="form-control mr-3">
        <option value="">Selecione o Risco</option>
        <option value="residual">Risco Residual</option>
        <option value="inerente">Risco Inerente</option>
        <option value="futuro">Risco Futuro</option>
    </select>

    <select name="filter_prioridade" id="filter_prioridade" class="form-control mr-3">
        <option value="">Selecione a Prioridade</option>
        <option value="baixa">Baixa</option>
        <option value="media">Média</option>
        <option value="alta">Alta</option>
    </select>

    <select name="filter_responsavel" id="filter_responsavel" class="form-control mr-3">
        <option value="">Selecione o Responsável</option>
        <option value="<?php echo $responsavel['id'] ?>"><?php echo $responsavel['responProc'] ?></option>
    </select>


    <input type="date" name="cad-data-inicio" id="cad-data-inicio" class="form-control mr-3" autocomplete="off">

    <label>Até</label>

    <input type="date" name="cad-data-termino" id="cad-data-termino" class="form-control ml-3" autocomplete="off">


    <input type="submit" class="btn btn-info ml-3" />

</form>

<table id="example-tratamento" class="display table">

    <thead>
        <tr>
            <th style="width:400px;text-align:left;">Desc. Evento de Risco </th>
            <th style="width:200px;text-align:left;">Causa</th>
            <th style="width:200px;">Planejamento</th>
            <th>Prioridade </th>
            <th>Inicio </th>
            <th>Término </th>
            <th>Status</th>
            <th style="width:100px;">Responsável</th>
            <th style="width:160px;">Risco Inerente </th>
            <th style="width:160px;">Risco Residual </th>
            <th style="width:130px;">Risco Futuro </th>
            <th style="width:40px">Editar</th>
            <th style="width:40px">Excluir</th>
        </tr>
    </thead>




    <tbody>

        <?php

        if (isset($_POST['filter_status'])) {
          $filter_status = $_POST['filter_status'];
        }


        if ($filter_status == 'aberto') {
          $sql = "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz' and status='Aberto'";
        }

        if ($filter_status == 'concluido') {
          $sql = "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz' and status='Concluído'";
        }
        if ($filter_status == 'andamento') {
          $sql = "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz' and status='Em andamento'";
        }
        if ($filter_status == 'niniciado') {
          $sql = "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz' and status='Não iniciado'";
        } else {
        $sql = "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz'";


        $selecao = mysqli_query($conexao, $sql);
        while ($registros = mysqli_fetch_array($selecao)) {
            $riscos = $registros['risco'];





        ?>

            <tr style="height:150px">


                <td style="padding-left:20px;">
                    <?php
                    $selecao_risco = mysqli_query($conexao, "select * from identificacao_do_risco where id='$codigo_matriz'");
                    while ($registros_matriz = mysqli_fetch_array($selecao_risco)) {
                        $evento_risco = $registros_matriz['evento_risco'];
                        $codigo = $registros_matriz['id'] ?>
                        <a style="width:400px;" class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                            <?php echo $registros_matriz['evento_risco'] ?></a>
                    <?php } ?>
                </td>


                <td style="text-align:left;">
                    <?php print $filter_status ?>
                    <a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['causa'] ?></a>
                </td>

                <td style="text-align:left;padding-left:20px;">
                    <a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planejamento'] ?></a>
                </td>

                <td style="text-align:left;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['prioridade'] ?></a></td>

                <td style="text-align:center;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                        <?php $registros['data_inicio'];

                        $data_inicio = $registros['data_inicio'];

                        $ano_min = substr($data_inicio, 0, 4);
                        $mes_min = substr($data_inicio, 5, 2);
                        $dia_min = substr($data_inicio, 8, 2);

                        echo  @$data_inicio = $dia_min . "/" . $mes_min . "/" . $ano_min;



                        ?>




                    </a></td>

                <td style="text-align:center;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php

                                                                                                                                        @$data_max = $data_inicio = $registros['data_vencimento'];
                                                                                                                                        $ano_max = substr($data_max, 0, 4);
                                                                                                                                        $mes_max = substr($data_max, 5, 2);
                                                                                                                                        $dia_max = substr($data_max, 8, 2);

                                                                                                                                        echo @$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;







                                                                                                                                        ?></a></td>

                <td style="text-align:center;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                        <?php echo $registros['status'] ?>
                    </a></td>



                <td style="text-align:center;"><a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>">
                        <?php echo $registros['responProc'] ?>
                    </a></td>

                <td style="width:125px;" class="dormitorio">
                    <?php
                    if ($riscos === 'Risco Inerente') {
                    ?>
                        <?php echo $registros['risco'] ?>
                    <?php } ?>
                </td>



                <td style="width:125px;" class="dormitorio">
                    <?php if ($riscos === 'Risco Residual') { ?>
                        <?php echo $registros['risco'] ?>
                    <?php } ?>
                </td>

                <td style="width:125px;" class="dormitorio">
                    <?php
                    if ($riscos === 'Risco Futuro') {
                    ?>
                        <?php echo $registros['risco'] ?>

                    <?php } ?>
                </td>


                <td style="text-align:center;">
                    <i class="fa fa-edit" style="cursor: pointer" onClick="EditarTratamento(<?php echo $registros['id'] ?>)" data-toggle="modal" data-target="#ModalEditarTratamento"></i>
                </td>
                <td style="text-align:center;">
                    <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirTratamento(<?php echo $registros['id'] ?>)"></i>
                </td>



            <?php
        }

            ?>

    </tbody>

</table>


<script>
    $y = jQuery.noConflict()
    $y(document).ready(function() {
        $y('#example-tratamento').DataTable();
    });



    $y("#example-tratamento").dataTable({
        "iDisplayLength": 4,
        "scrollY": 300,
        "bJQueryUI": true,
        "bFilter": false,
        "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": false,
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }
        }
    });
</script>