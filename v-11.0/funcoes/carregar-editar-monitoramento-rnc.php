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
$selecao = mysqli_query($conexao, "select * from monitoramento_rnc WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>



<div class="row ml-4 mr-4">



    <div style="width:750px;height:200px;" class="col-md-12">

        <label>Descrição do Monitoramento</label>
        <textarea type="text" class="form-control" name="editar-desc-monitoramento" id="editar-desc-monitoramento" rows="5" cols="7" value="<?php echo $registros['descricao'] ?>"><?php echo $registros['descricao'] ?></textarea>

    </div>
    <div class="col-md-12 row">
        <div class="col-md-6">
            <label>Plano de Ação</label>
            <input type="text" class="form-control" name="editar-plano-acao" id="editar-plano-acao" value="<?php echo $registros['item'] ?>">

        </div>

        <div class="col-md-6">
            <label>Área</label>
            <input type="text" class="form-control" name="
            
            
            
            ----------" id="editar-area-monitoramento" value="<?php echo $registros['area'] ?>">

        </div>
    </div>

    <div class="col-md-12 row">

        <div class="col-md-6">
            <label>Responsável</label>
            <input type="text" class="form-control" name="editar-responsavel-monitoramento" id="editar-responsavel-monitoramento" value="<?php echo $registros['responsavel_monitor'] ?>">

        </div>

        <div class="col-md-3">
            <label>Data</label>
            <input type="date" class="form-control" name="editar-data-monitoramento" id="editar-data-monitoramento" value="<?php echo $registros['data'] ?>">

        </div>

        <div class="col-md-3">
            <label>Status</label>
            <input type="text" class="form-control" name="editar-status-monitoramento" id="editar-status-monitoramento" value="<?php echo $registros['status'] ?>">

        </div>

    </div>




    <div class="col-md-12 ml-2 mt-4">
        <input type="button" value="Atualizar Monitormamento" class="btn btn-primary float-right" onClick="AtualizarMonitoramento(<?php echo $registros['id'] ?>)" data-dismiss="modal">

    </div>