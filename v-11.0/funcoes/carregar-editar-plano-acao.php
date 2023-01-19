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
$selecao = mysqli_query($conexao, "select * from tabela_plano_de_acao_temp WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>



<div class="row ml-4 mr-4">


    <div style="width:750px;height:200px;" class="col-md-12">

        <label>Descrição do Plano de Ação</label>
        <textarea type="text" class="form-control" name="editar-desc-plano-acao" id="editar-desc-plano-acao" rows="5" cols="7" value="<?php echo $registros['descricao'] ?>"><?php echo $registros['descricao'] ?></textarea>

    </div>
    <div class="col-md-12 row">
        <div class="col-md-6">
            <label>Início</label>
            <input type="date" class="form-control" name="editar-inicio-plano-acao" id="editar-inicio-plano-acao" value="<?php echo $registros['data_prevista_conclusao'] ?>">

        </div>

        <div class="col-md-6">
            <label>Término</label>
            <input type="date" class="form-control" name="editar-termino-plano-acao" id="editar-termino-plano-acao" value="<?php echo $registros['data_conclusao'] ?>">

        </div>
    </div>

    <div class="col-md-12 row">
        <div class="col-md-6">
            <label>Prioridade</label>
            <input type="text" class="form-control" name="editar-prioridade-plano-acao" id="editar-prioridade-plano-acao" value="<?php echo $registros['prioridade'] ?>">


        </div>

        <div class="col-md-6">
            <label>Status</label>
            <input type="text" class="form-control" name="editar-status-plano-acao" id="editar-status-plano-acao" value="<?php echo $registros['status'] ?>">

        </div>

    </div>
    <div class="col-md-12 row">
        <div class="col-md-6">
            <label>Área</label>
            <input type="text" class="form-control" name="editar-area-plano-acao" id="editar-area-plano-acao" value="<?php echo $registros['area'] ?>">

        </div>

        <div class="col-md-6">
            <label>Responsável</label>
            <input type="text" class="form-control" name="editar-responsavel-plano-acao" id="editar-responsavel-plano-acao" value="<?php echo $registros['responsavel'] ?>">

        </div>

    </div>



    <div class="col-md-12 ml-2 mt-4">
        <input type="button" value="Atualizar Plano de Ação" class="btn btn-primary float-right" onClick="AtualizarPlanoAcao(<?php echo $registros['id'] ?>)" data-dismiss="modal">

    </div>