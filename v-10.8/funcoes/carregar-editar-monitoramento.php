<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
$codigo = $_POST['codigo'];

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>


<?php
$selecao = mysqli_query($conexao, "select * from monitoramento_risco WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>





<div class="row ml-4 mr-4 mt-4 mb-4">


    <div>

        <div class="mt-1 px-0 py-0" style="width:700px;height:350px;">
            <h5 style="font-weight:800;">Métricas Para Acompanhamento das Ações</h5>


            <div class="col-md-10 px-0 py-0">
                <label>Definição de KPI's</label>
                <textarea name="edit_definicao_kpis" id="edit_definicao_kpis" class="form-control" required rows="3" value="<?php echo $registros['definicao_kpis'] ?>"> <?php echo $registros['definicao_kpis'] ?> </textarea>
            </div>

            <div class="col-md-3 mt-4 px-0 py-0">
                <label>Periodicidade</label>
                <input type="text" class="form-control" name="edit-periodicidade" id="edit-periodicidade" required value="<?php echo $registros['periodicidade'] ?>">

            </div>


            <div class="col-md-8 mt-4 px-0 py-0">
                <label>Responsável</label>
                <input type="text" name="edit-responsavel" id="edit-responsavel" class="form-control" required value="<?php echo $registros['responsavel'] ?>">
            </div>
        </div>


        <div class="mt-5" style="width:750px;height:200px;">
            <h5 style="font-weight:800;">Evidências Métricas</h5>

            <div class="d-flex" style="display:flex;align-items:center;">

                <div class="col-md-6 mb-4 px-0 py-0">
                    <label>Objetivo atendido?</label>
                    <input type="text" class="form-control" name="edit-objetivo" id="edit-objetivo" value="<?php echo $registros['objetivo_sim_nao'] ?>">

                </div>


                <div class="col-md-6 mb-4">
                    <label>Indicação de necessidade de revisão </label>
                    <input type="text" class="form-control" name="edit-necessidade_revisao" id="edit-necessidade_revisao" value="<?php echo $registros['necessidade_revisao_sim_nao'] ?>">

                </div>
            </div>

        </div>

    </div>

    <div class="col-md-12 ml-2 mt-4">
        <input type="button" value="Atualizar Monitoramento" class="btn btn-primary float-right" onClick="AtualizarMonitoramento(<?php echo $registros['id'] ?>)" data-dismiss="modal">

    </div>