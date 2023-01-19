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
$selecao = mysqli_query($conexao, "select * from analise_rnc WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>



<div class="row ml-4 mr-4">


    <div style="width:750px;height:200px;" class="col-md-12">

        <label>Descrição Análise</label>
        <textarea type="text" class="form-control" name="editar-desc-analise" id="editar-desc-analise" rows="5" cols="7" value="<?php echo $registros['descricao'] ?>"><?php echo $registros['descricao'] ?></textarea>

    </div>
    <div class="col-md-12 row">
        <div class="col-md-3">
            <label>Área</label>
            <input type="text" class="form-control" name="editar-area-analise" id="editar-area-analise" value="<?php echo $registros['area'] ?>">

        </div>

        <div class="col-md-6">
            <label>Responsável pela análise</label>
            <input type="text" class="form-control" name="editar-responsavel-analise" id="editar-responsavel-analise" value="<?php echo $registros['responsavel_analise'] ?>">

        </div>


        <div class="col-md-3">
            <label>Data</label>
            <input type="date" class="form-control" name="editar-data-analise" id="editar-data-analise" value="<?php echo $registros['data'] ?>">

        </div>

    </div>

    <div class="col-md-12 row mt-1">
        <div class="col-md-6">
            <label>Parecer</label>
            <input type="text" class="form-control" name="editar-parecer-analise" id="editar-parecer-analise" value="<?php echo $registros['parecer'] ?>">


        </div>

        <div class="col-md-6">
            <label>Objetivo atendido ?</label>
            <input type="text" class="form-control" name="editar-objetivo-analise" id="editar-objetivo-analise" value="<?php echo $registros['objetivo'] ?>">

        </div>

        <div class="col-md-6">
            <label>Indicação de necessacidade de revisão</label>
            <input type="text" class="form-control" name="editar-necessidade-analise" id="editar-necessidade-analise" value="<?php echo $registros['necessidade'] ?>">

        </div>

    </div>




    <div class="col-md-12 ml-2 mt-4">
        <input type="button" value="Atualizar Análise" class="btn btn-primary float-right" onClick="AtualizarAnaliseRnc(<?php echo $registros['id'] ?>)" data-dismiss="modal">

    </div>