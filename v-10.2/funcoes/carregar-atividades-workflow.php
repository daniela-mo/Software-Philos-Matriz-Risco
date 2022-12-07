<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
$codigo = $_POST['codigo'];
$cod = $_POST['cod'];
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div id="carregar-listar-usuarios-tarefas"></div>

<table class="table">
    <script>
        function calcula_prazo() {
            var data_atual = new Date();
            var data_campo = document.getElementById('dtRetornoPrazo').value;
            var data_dev = document.getElementById('dtDevolutiva').value;

            if (data_dev == '') {
                var dateC1 = new Date(data_campo);
                var dateA1 = new Date(data_atual);


                var difference = Math.abs(dateC1 - dateA1);
                resultado = Math.ceil(difference / (1000 * 3600 * 24))
                document.getElementById('diasRetPrazo').value = parseInt(resultado) - 1


                if (resultado == '1') {
                    document.getElementById('statusDevolutiva').value = '1';
                } else if (dateC1 > dateA1) {
                    document.getElementById('statusDevolutiva').value = '1';
                    document.getElementById('diasRetPrazo').value = '0'
                } else if (dateC1 < dateA1) {
                    document.getElementById('statusDevolutiva').value = '2';
                    // alert(resultado)
                }

            }
        }



        function calcula_prazoAtend() {
            var data_atual = new Date();
            var data_campo = document.getElementById('pzAtendPlanAcao').value;
            var data_atend = document.getElementById('datAtendPlanAcao').value;

            if (data_atend == '') {
                var dateC = new Date(data_campo);
                var dateA = new Date(data_atual);


                var difference = Math.abs(dateA - dateC);
                resultado2 = Math.ceil(difference / (1000 * 3600 * 24))
                document.getElementById('diasAtraso').value = parseInt(resultado2) - 1


                if (resultado2 == '1') {
                    document.getElementById('statusPrazoPlanoAcao').value = '1';

                } else if (dateC > dateA) {
                    document.getElementById('statusPrazoPlanoAcao').value = '1';
                    document.getElementById('diasAtraso').value = '0'
                } else if (dateC < dateA) {
                    document.getElementById('statusPrazoPlanoAcao').value = '2';
                }

            }
        }


        function calcula_dataDevolutiva() {

            var data1 = document.getElementById('dtEnvioPlanoAcao').value;
            var data2 = document.getElementById('dtRetornoPrazo').value;
            var data3 = document.getElementById('dtDevolutiva').value;
            if (data3 != '') {

                var dt2 = new Date(data2)
                var dt3 = new Date(data3)

                var difference = Math.abs(dt3 - dt2);
                resultado = difference / (1000 * 3600 * 24)
                document.getElementById('diasRetPrazo').value = resultado

                if (data3 == '') {
                    document.getElementById('statusDevolutiva').value = '';
                } else if (data3 < data2 || resultado < 0) {
                    document.getElementById('diasRetPrazo').value = '0';
                    document.getElementById('statusDevolutiva').value = '3';
                } else if (data3 > data2) {
                    document.getElementById('statusDevolutiva').value = '3';
                } else if (resultado == 0) {
                    document.getElementById('statusDevolutiva').value = '3';
                }
            } else if (data1 == '' && data2 == '' && data3 == '') {
                document.getElementById('diasRetPrazo').value = '';
                document.getElementById('statusDevolutiva').value = '0';
            } else if (data3 == '' && data3 < data2) {
                document.getElementById('statusDevolutiva').value = '1';
                document.getElementById('diasRetPrazo').value = '0';
            }
        }


        function calcula_dataAtendimento() {

            var data4 = document.getElementById('pzAtendPlanAcao').value;
            var data5 = document.getElementById('datAtendPlanAcao').value;
            if (data5 == '' && data5 < data4) {
                document.getElementById('statusPrazoPlanoAcao').value = '2';
                document.getElementById('diasAtraso').value = '0';
            } else if (data5 != '') {

                var dt4 = new Date(data4)
                var dt5 = new Date(data5)

                var difference = Math.abs(dt5 - dt4)

                resultado2 = difference / (1000 * 3600 * 24)
                document.getElementById('diasAtraso').value = resultado2


                if (data5 == '') {
                    document.getElementById('statusPrazoPlanoAcao').value = '';
                } else if (data4 > data5) {
                    document.getElementById('diasAtraso').value = '0';
                    document.getElementById('statusPrazoPlanoAcao').value = '3';
                } else if (data5 > data4) {
                    document.getElementById('statusPrazoPlanoAcao').value = '3';
                } else if (data4 = data5) {
                    document.getElementById('statusPrazoPlanoAcao').value = '3';
                } else if (resultado2 == 0 && data4 == '') {
                    document.getElementById('statusPrazoPlanoAcao').value = '1';
                }
            }
        }






        // function calcula_dataAtendimento() {

        //     var data4 = document.getElementById('pzAtendPlanAcao').value;
        //     var data5 = document.getElementById('datAtendPlanAcao').value;
        //     if (data5 != '') {

        //         var dt4 = new Date(data4)
        //         var dt5 = new Date(data5)

        //         var difference = Math.abs(dt5 - dt4)
        //         resultado2 = difference / (1000 * 3600 * 24)
        //         document.getElementById('disasAtraso').value = resultado2


        //         if (data5 == '') {
        //             document.getElementById('statusPrazoPlanoAcao').value = '';
        //         } else if (data5 < data4 || resultado2 < 0) {
        //             document.getElementById('diasAtraso').value = '0';
        //             document.getElementById('statusPrazoPlanoAcao').value = '3';
        //         } else if (data5 > data4) {
        //             document.getElementById('statusPrazoPlanoAcao').value = '3';
        //         } else if (data4 = data5) {
        //             document.getElementById('statusPrazoPlanoAcao').value = '3';
        //         } else if (resultado2 == 0 && data4 == '') {
        //             document.getElementById('statusPrazoPlanoAcao').value = '3';
        //         }
        //     } else if (data4 == '' && data5 == '') {
        //         document.getElementById('diasAtraso').value = '';
        //         document.getElementById('statusPrazoPlanoAcao').value = '0';
        //     } else if (data5 == '') {
        //         document.getElementById('statusPrazoPlanoAcao').value = '1';
        //         document.getElementById('diasAtraso').value = '0';
        //     }
        // }
    </script>




    <?php

    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    $selecao = mysqli_query($conexao, "select * from atividades_planejamento_workflow WHERE id='$codigo' LIMIT 1");
    while ($registros = mysqli_fetch_array($selecao)) {
        $codigo_atividade = $registros['id'];
    ?>

        <tr>
            <th><label>Atividade</label>
                <h4>
                    <input type="text" value="<?php echo $registros['atividade']; ?>" class="form-control" id="atividade">
                </h4>
            </th>

        </tr>






        <tr>
            <th><label>Item Qaa</label>
                <h4>
                    <input type="text" value="<?php echo $registros['itemQaa']; ?>" class="form-control" id="itemQaa">
                </h4>
            </th>

        </tr>
        <tr>
            <th><label>Responsável Processo</label>
                <h4>
                    <input type="text" value="<?php echo $registros['responProc']; ?>" class="form-control" id="responProc">
                </h4>
            </th>

        </tr>
        <tr>
            <th><label>Responsável Ação</label>
                <h4>
                    <input type="text" value="<?php echo $registros['responAcao']; ?>" class="form-control" id="responAcao">
                </h4>
            </th>

        </tr>



        <tr class="col-md-8 mt-3 mb-2">
            <th>



                <label>Planta</label>
                <select class="form-control" name="razao_social" id="razao_social">
                    <option value="0">Escolher Planta</option>
                    <?php
                    $selecao_empresas = mysqli_query($conexao, "select * from filiais order by razao_social ASC");
                    while ($registros_empresas = mysqli_fetch_array($selecao_empresas)) {
                    ?>
                        <option value="<?php echo $registros_empresas['razao_social'] ?>">
                            <?php echo $registros_empresas['razao_social'] ?> </option>

                    <?php } ?>

                    <?php
                    $selecao_empresas = mysqli_query($conexao, "select * from empresas order by razao_social ASC");
                    while ($registros_empresas = mysqli_fetch_array($selecao_empresas)) {
                    ?>
                        <option value="<?php echo $registros_empresas['razao_social'] ?>"><?php echo $registros_empresas['razao_social'] ?>
                            - </option>

                    <?php } ?>
                </select>


                <!-- <select class="form-control" name="empresa" id="empresa">

                    <?php
                    $planta = $registros['empresa'];
                    if ($planta == "POSITIVO TECNOLOGIA S.A. 81.243.735/0001-48 ") {
                        $valor_planta = 0;
                    }
                    if ($planta == "POSITIVO TECNOLOGIA S.A. - 25.096.598/0001-95 ") {
                        $valor_planta = 1;
                    }
                    if ($planta == "564646 - 26.624.541/0001-84 ") {
                        $valor_planta = 2;
                    }
                    if ($planta == "POSITIVO TECNOLOGIA S.A. - 81.243.735/0019-77 ") {
                        $valor_planta = 3;
                    }
                    if ($planta == "POSITIVO TECNOLOGIA S.A. - 81.243.735/0009-03") {
                        $valor_planta = 4;
                    }
                    ?>

                    <?php if ($planta != 'POSITIVO TECNOLOGIA S.A. 81.243.735/0001-48 ') { ?>
                        <option value='0' id="0">POSITIVO TECNOLOGIA S.A. 81.243.735/0001-48</option>

                    <?php } ?>

                    <?php if ($planta != '"BOREO INDUSTRIA DE COMPONENTES LTDA') { ?>
                        <option value='1' id="1">BOREO INDUSTRIA DE COMPONENTES LTDA - 25.096.598/0001-95 </option>

                    <?php } ?>

                    <?php if ($planta != '564646 - 26.624.541/0001-84 ') { ?>
                        <option value='2' id="2">564646 - 26.624.541/0001-84 </option>

                    <?php } ?>

                    <?php if ($planta != 'POSITIVO TECNOLOGIA S.A. - 81.243.735/0019-77 ') { ?>
                        <option value='3' id="3">POSITIVO TECNOLOGIA S.A. - 81.243.735/0019-77 </option>

                    <?php } ?>
                    <?php if ($planta != 'POSITIVO TECNOLOGIA S.A. - 81.243.735/0009-03') { ?>
                        <option value='4' id="4">POSITIVO TECNOLOGIA S.A. - 81.243.735/0009-03</option>

                    <?php } ?>
                    <?php if ($planta != '') { ?>
                        <option value="<?php print $valor_planta; ?>" id="<?php print $valor_planta; ?>" selected><?php echo $registros['empresa'] ?></option>

                    <?php } ?>

                </select> -->

            </th>
        </tr>




        <tr>
            <th><label>Departamento</label>
                <h4>
                    <input type="text" value="<?php echo $registros['departamento']; ?>" class="form-control" id="departamento">
                </h4>
            </th>

        </tr>


        <tr>
            <th><label>Plano de Ação</label>
                <h4>
                    <input type="text" value="<?php echo $registros['planoAcao']; ?>" class="form-control" id="planoAcao">
                </h4>
            </th>

        </tr>



        <tr>
            <th><label>Mapa de Risco</label>
                <h4>
                    <input type="text" value="<?php echo $registros['mapaRisco']; ?>" class="form-control" id="mapaRisco">
                </h4>
            </th>

        </tr>

        <tr>
            <th><label>Data Envio Plano de Ação</label>
                <h4>
                    <input type="date" value="<?php echo $registros['dtEnvioPlanoAcao']; ?>" class="form-control" id="dtEnvioPlanoAcao">
                </h4>
            </th>

        </tr>

        <tr>
            <th><label>Data para retorno com o prazo</label>
                <h4>
                    <input type="date" value="<?php echo $registros['dtRetornoPrazo']; ?>" class="form-control" id="dtRetornoPrazo" onBlur="calcula_prazo()">
                </h4>
            </th>

        </tr>
        <tr>
            <th><label>Data da devolutiva</label>
                <h4>
                    <input type="date" value="<?php echo $registros['dtDevolutiva']; ?>" class="form-control" id="dtDevolutiva" onChange="calcula_dataDevolutiva(), calcula_prazo() ">
                </h4>
            </th>

        </tr>
        <tr>
            <th><label>Dias de atraso para retorno com o prazo</label>
                <h4>
                    <input value="<?php echo $registros['diasRetPrazo']; ?>" class="form-control" type="number" id="diasRetPrazo">
                </h4>
            </th>

        </tr>



        <tr class=" col-md-8 mt-3 mb-2">
            <th>
                <label>Status prazo devolutiva</label>


                <select class="form-control" name="statusDevolutiva" id="statusDevolutiva">

                    <?php
                    $statusDev = $registros['statusDevolutiva'];
                    if ($statusDev == "Não iniciado") {
                        $valor_status = 0;
                    }
                    if ($statusDev == "Dentro do Prazo") {
                        $valor_status = 1;
                    }
                    if ($statusDev == "Em atraso") {
                        $valor_status = 2;
                    }
                    if ($statusDev == "Concluído") {
                        $valor_status = 3;
                    }

                    ?>

                    <?php if ($statusDev != 'Não iniciado') { ?>
                        <option value='0' id="0">Não iniciado</option>

                    <?php } ?>

                    <?php if ($statusDev != 'Dentro do Prazo') { ?>
                        <option value='1' id="1">Dentro do Prazo</option>

                    <?php } ?>

                    <?php if ($statusDev != 'Em atraso') { ?>
                        <option value='2' id="2">Em atraso</option>

                    <?php } ?>

                    <?php if ($statusDev != 'Concluído') { ?>
                        <option value='3' id="3">Concluído</option>

                    <?php } ?>
                    <?php if ($statusDev != '') { ?>
                        <option value="<?php print $valor_status; ?>" id="<?php print $valor_status; ?>" selected><?php echo $registros['statusDevolutiva'] ?></option>

                    <?php } ?>

                </select>

            </th>
        </tr>


        <tr>
            <th><label>Prazo para atendimento do plano de ação</label>
                <h4>
                    <input type="date" value="<?php echo $registros['pzAtendPlanAcao']; ?>" class="form-control" id="pzAtendPlanAcao" onBlur="calcula_prazoAtend()">
                </h4>
            </th>

        </tr>

        <tr>
            <th><label>Data de atendimento do plano de ação</label>
                <h4>
                    <input type="date" value="<?php echo $registros['datAtendPlanAcao']; ?>" class="form-control" id="datAtendPlanAcao" onChange="calcula_dataAtendimento(), calcula_prazoAtend()">
                </h4>
            </th>

        </tr>
        <tr>
            <th><label>Dias de atraso</label>
                <h4>
                    <input type="number" pattern="[0-9]+$" value="<?php echo $registros['diasAtraso']; ?>" class="form-control" id="diasAtraso">
                </h4>
            </th>

        </tr>

        <tr class="col-md-8 mt-3 mb-2">
            <th>
                <label>Status prazo atedimento plano de ação</label>


                <select class="form-control" name="statusPrazoPlanoAcao" id="statusPrazoPlanoAcao">
                    <?php
                    $statusPrazo = $registros['statusPrazoPlanoAcao'];
                    if ($statusPrazo == "Não iniciado") {
                        $valor_prazo = 0;
                    }
                    if ($statusPrazo == "Dentro do Prazo") {
                        $valor_prazo = 1;
                    }
                    if ($statusPrazo == "Em atraso") {
                        $valor_prazo = 2;
                    }
                    if ($statusPrazo == "Concluído") {
                        $valor_prazo = 3;
                    }
                    ?>

                    <?php if ($statusPrazo != 'Não iniciado') { ?>
                        <option value='0' id="0">Não iniciado</option>
                        <!-- <option>Não iniciado</option> -->
                    <?php } ?>

                    <?php if ($statusPrazo != 'Dentro do Prazo') { ?>
                        <option value='1' id="1">Dentro do Prazo</option>
                        <!-- <option>Dentro do Prazo</option> -->
                    <?php } ?>

                    <?php if ($statusPrazo != 'Em atraso') { ?>
                        <option value='2' id="2">Em atraso</option>
                        <!-- <option>Em atraso</option> -->
                    <?php } ?>

                    <?php if ($statusPrazo != 'Concluído') { ?>
                        <option value='3' id="3">Concluído</option>
                        <!-- <option>Concluído</option> -->
                    <?php } ?>
                    <?php if ($statusPrazo != '') { ?>
                        <option value="<?php print $valor_prazo; ?>" id="<?php print $valor_prazo; ?>" selected><?php echo $registros['statusPrazoPlanoAcao'] ?></option>


                    <?php } ?>

                </select>


            </th>
        </tr>


        <tr>

            <td>
                <label>Descrição</label>
                <textarea class="form-control" rows="10" id="cad-descricao"><?php echo $registros['descricao']; ?></textarea>
            </td>

        </tr>



        <tr>
            <td><label>Envolvido</label>
                <input type="text" class="form-control" name="cad-envolvido" id="cad-envolvido-tarefa" value="<?php echo $registros['envolvido'] ?>">
            </td>
        </tr>





    <?php } ?>

</table>


<h5>Anexos <img src="../imgs/icone-mais.png" width="25" alt="" data-toggle="modal" data-target="#exampleModal" /></h5>
<div id="respostaarquivo"></div>
<div id="carrega-anexos"></div>
<table class="table">
    <?php
    $selecao2 = mysqli_query($conexao, "select * from upload_workflow WHERE codigo_cadastro='$codigo'");
    while ($registros2 = mysqli_fetch_array($selecao2)) {
    ?>


        <tr>
            <td><img src="../imgs/icone-documento.png" width="15" height="17" alt="" /> <?php echo $registros2['arquivo'] ?></td>
            <td>Arquivo enviado em: <?php echo $registros2['data'] ?> - <?php echo $registros2['hora'] ?></td>
            <td style="cursor: pointer" onClick="DeletarAnexo2(<?php echo $registros2['id'] ?>)"><strong><i class="fa fa-trash"></i></strong></td>
        </tr>


    <?php } ?>
</table>

<?php
$selecao = mysqli_query($conexao, "select * from atividades_planejamento_workflow WHERE id='$codigo'");
while ($registros = mysqli_fetch_array($selecao)) {
?>


    <div class="row">
        <div class="col-md-6">
            <label>Inicio</label>
            <input type="text" class="form-control datepicker" name="cad-inicio" id="cad-inicio" value="<?php

                                                                                                        @$data_min = $registros['data_inicio'];
                                                                                                        $ano_min = substr($data_min, 0, 4);
                                                                                                        $mes_min = substr($data_min, 5, 2);
                                                                                                        $dia_min = substr($data_min, 8, 2);

                                                                                                        @$data_min = $dia_min . "/" . $mes_min . "/" . $ano_min;

                                                                                                        echo    @$data_min;




                                                                                                        ?>" readonly>
        </div>

        <div class="col-md-6">
            <label>Término</label>
            <input type="text" class="form-control datepicker" name="cad-termino" id="cad-termino" value="<?php


                                                                                                            @$data_max = $registros['data_termino'];
                                                                                                            $ano_max = substr($data_max, 0, 4);
                                                                                                            $mes_max = substr($data_max, 5, 2);
                                                                                                            $dia_max = substr($data_max, 8, 2);

                                                                                                            @$data_max = $dia_max . "/" . $mes_max . "/" . $ano_max;

                                                                                                            echo @$data_max;



                                                                                                            ?>" readonly>
        </div>

        <div class="col-md-8 mt-3 mb-2">
            <label>Status:</label>

            <?php
            $status = $registros['status'];
            ?>

            <select class="form-control" name="cad-status" id="cad-status">

                <?php if ($status != '') { ?>
                    <option selected><?php echo $registros['status'] ?></option>

                <?php } ?>
                <?php if ($status != 'Não iniciado') { ?>
                    <option>Não iniciado</option>
                <?php } ?>

                <?php if ($status != 'Em andamento') { ?>
                    <option>Em andamento</option>
                <?php } ?>

                <?php if ($status != 'Concluído]') { ?>
                    <option>Concluído</option>
                <?php } ?>

            </select>

        </div>



        <div class="col-md-4 mt-3">
            <label>Periodicidade</label>
            <select class="form-control" name="cad-periodicidade4" id="cad-periodicidade4">
                <option><?php echo $registros['periodicidade'] ?></option>
                <option>Diário</option>
                <option>Quinzenal</option>
                <option>Mensal</option>
                <option>Bimestral</option>
                <option>Trimestral</option>
                <option>Semestral</option>
                <option>Anual</option>
                <option>Bianual</option>
            </select>
        </div>


        <div class="col-md-12 mb-4 mt-3">
            <label>Área</label>
            <select class="form-control" name="cad-area-tarefa" id="area">

                <?php
                if ($registros['area'] != '') {
                    $id_area = $registros['area'];
                    $selecao_areas = mysqli_query($conexao, "select * from areas WHERE id='$id_area'");
                    $reg = mysqli_fetch_array($selecao_areas);
                ?>
                    <option value="<?php echo $registros['area'] ?>"> <?php echo $reg['area'] ?></option>
                <?php } else { ?>
                    <option value="0">Escolher</option>
                <?php } ?>

                <?php

                $selecao_areas = mysqli_query($conexao, "select * from areas order by area ASC");
                while ($registros_areas = mysqli_fetch_array($selecao_areas)) {

                    if ($registros['area'] != $registros_areas['id']) {
                ?>
                        <option value="<?php echo $registros_areas['id'] ?>"><?php echo $registros_areas['area'] ?></option>

                <?php }
                } ?>
            </select>
        </div>

    </div>

<?php } ?>
<table class="table">
    <tr>
        <th>
            Responsáveis Tarefas <a onclick="AddResponsavel(<?php echo $codigo ?>)" data-toggle="modal" data-target="#ModalAddResponsavel" class="pointer">+</a>
        </th>
    </tr>

</table>


<div id="carregar-responsaveis-tarefas"></div>



<input type="button" class="btn btn-primary" value="Atualizar Atividade" onClick="AtualizarAtividade(<?php echo $codigo ?>)">






<!-- Modal -->
<div class="modal fade" id="ModalAddResponsavel" tabindex="-1" role="dialog" aria-labelledby="ModalAddResponsavel" aria-hidden="true" style="z-index: 999999999">
    <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 999999999">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Responsáveis Tarefas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="resposta-modal"></div>

                <div id="carregar-listar-usuarios-atividades"></div>

            </div>
            <div class="modal-footer">
                <select class="form-control" id="novo-user">
                    <option value="0">Novo usuário</option>
                    <?php
                    $selecao_usuarios = mysqli_query($conexao, "select * from usuarios_empresa");
                    while ($registros_usuarios = mysqli_fetch_array($selecao_usuarios)) {
                    ?>

                        <option value="<?php echo $registros_usuarios['id'] ?>"><?php echo $registros_usuarios['nome'] ?>|<?php echo $registros_usuarios['email'] ?></option>

                    <?php } ?>

                </select>

                <input type="button" value="Adicionar" class="btn btn-primary" onclick="GravarTarefaResponsavel(<?php echo $codigo_tarefa ?>)">

            </div>
        </div>
    </div>
</div>