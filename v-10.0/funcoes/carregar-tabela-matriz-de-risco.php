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
                    <th style="width:400px;">Desc. Evento de Risco </th>
                    <th style="width:200px;">Causa</th>
                    <th style="width:200px;">Planejamento</th>
                    <th>Prioridade </th>
                    <th>Inicio </th>
                    <th>Término </th>
                    <th>Status</th>
                    <th style="width:100px;">Responsável</th>
                    <th style="width:150px;">Risco Inerente </th>
                    <th style="width:150px;">Risco Residual </th>
                    <th style="width:150px;">Risco Futuro </th>
                    <th>Ação</th>

                </tr>
            </thead>
            <tbody>

                <?php

                // $selecao2 = mysqli_query($conexao, "select * from responsaveis_workflow WHERE codigo_usuario='$codigo_usuario'");
                // $registros2 = mysqli_fetch_array($selecao2);
                // $codigo_workflow = $registros2['codigo_workflow'];

                $selecao = mysqli_query($conexao, "select * from workflow WHERE codigo_matriz_risco='$codigo_matriz'");
                while ($registros = mysqli_fetch_array($selecao)) {
                    $riscos = $registros['risco'];
                ?>
                    <tr style="height:300px">


                        <td>
                            <?php
                            $selecao_risco = mysqli_query($conexao, "select * from identificacao_do_risco where id='$codigo_matriz'");
                            while ($registros_matriz = mysqli_fetch_array($selecao_risco)) {
                                $evento_risco = $registros_matriz['evento_risco'];
                                $codigo = $registros_matriz['id'] ?>
                                <a style="width:400px" class="text-dark" href="matriz-de-risco.php?cod=<?php echo $registros_matriz['id'] ?>">
                                    <?php echo $registros_matriz['evento_risco'] ?></a>
                            <?php } ?>
                        </td>


                        <td style="width:200px;">
                            <a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['causa'] ?></a>
                        </td>

                        <td style="width:200px;">
                            <a class="text-dark" href="planejamento-workflow.php?cod=<?php echo $registros['id'] ?>"><?php echo $registros['planejamento'] ?></a>
                        </td>

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

                        <td style="width:200px">
                            <?php
                            if ($riscos === 'Risco Inerente') {
                            ?>
                                <?php echo $registros['risco'] ?>
                            <?php } ?>
                        </td>



                        <td style="width:200px">
                            <?php if ($riscos === 'Risco Residual') { ?>
                                <?php echo $registros['risco'] ?>
                            <?php } ?>
                        </td>

                        <td style="width:200px">
                            <?php
                            if ($riscos === 'Risco Futuro') {
                            ?>
                                <?php echo $registros['risco'] ?>

                            <?php } ?>
                        </td>


                        <td>



                            <a class="text-dark" onClick="Excluir(<?php echo $registros['id']; ?>)">
                                <i class="fa fa-trash" style="cursor: pointer"></i></a>


                        </td>

                    </tr>

                <?php } ?>



        </table>
    </div>

</div>




<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin.min.js" type="text/javascript"></script>

<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src='https://cdn.jsdelivr.net/momentjs/latest/moment.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>



<script>
    $(document).ready(function() {
        //konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
        var $dTable = $('#example').DataTable({


            "iDisplayLength": 4,
            "scrollY": 300,
            //stateSave: true,
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
                    "sLast": "Último",
                    "pageLength": "1"
                }
            },

        });


    });
</script>