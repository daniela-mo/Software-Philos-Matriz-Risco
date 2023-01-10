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
$selecao = mysqli_query($conexao, "select * from workflow WHERE id='$codigo'");
$registros = mysqli_fetch_array($selecao);
?>





<div class="row ml-4 mr-4 mt-4 mb-4">


    <div class="modal-body">



        <div class="row ml-4 mr-6 mt-4 mb-4">
            <div class="col-md-12">
                <div id="retorno-datas" class="text-danger font-weight-bold mt-2 mb-2"></div>
            </div>


            <div>

                <div class="row col-md-12" style="align-items:center;justify-content:space-between;">

                    <div class="row col-md-5 mx-0 px-0 mb-4">

                        <label>Causa</label>
                        <textarea class="form-control" name="editar_causa_tratamento" id="editar_causa_tratamento" value="<?php echo $registros['causa'] ?>"><?php echo $registros['causa'] ?></textarea>

                    </div>
                    <div class="row col-md-5 mx-0 px-0 mb-4 ">

                        <label>Riscos</label>
                        <input class="form-control" name="edit_risco" id="edit_risco" value="<?php echo $registros['risco'] ?>">

                        </input>
                    </div>
                </div>




                <div class="mt-1 px-0 py-0" style="width:700px;">
                    <form id="form-tratamento">
                        <div class="row col-md-12 mb-4">
                            <label>Descrever ações </label>
                            <textarea class="form-control" cols="5" rows="7" name="edit_descricao" id="edit_descricao" value="<?php echo $registros['planejamento'] ?>"><?php echo $registros['planejamento'] ?></textarea>
                        </div>
                </div>


                <div class="mt-1 px-0 py-0 row" style="width:700px;">

                    <div class="col-md-4 mb-4">
                        <label>Responsável pela ação</label>
                        <input type="text" name="edit_responProc" id="edit_responProc" class="form-control" value="<?php echo $registros['responProc'] ?>"></input>
                    </div>



                    <div class="col-md-3 mb-4">
                        <label>Data Início</label>
                        <input type="text" name="edit_data_inicio" id="edit_data_inicio" class="form-control datepicker data" required autocomplete="off" value="<?php echo $registros['data_inicio'] ?>">
                    </div>

                    <div class="col-md-3 mb-4">
                        <label>Data Término</label>
                        <input type="text" name="edit_data_vencimento" id="edit_data_vencimento" class="form-control datepicker data" required autocomplete="off" value="<?php echo $registros['data_vencimento'] ?>">
                    </div>

                </div>


                <div class="mt-1 px-0 py-0 row" style="width:700px;">
                    <div class="col-md-4 mb-4">
                        <label>Prioridade</label>

                        <input name="edit_prioridade" id="edit_prioridade" class="form-control" value="<?php echo $registros['prioridade'] ?>">


                    </div>
                </div>

                </form>


            </div>
        </div>
    </div>
</div>

<div class="col-md-12 ml-2 mt-4">
    <input type="button" value="Atualizar Tratamento" class="btn btn-primary float-right" onClick="atualizarTratamento(<?php echo $registros['id'] ?>)" data-dismiss="modal">

</div>