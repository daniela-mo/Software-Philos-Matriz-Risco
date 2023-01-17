<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');


mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');





$id = $_REQUEST['codigo'];
?>


<table class="table table-striped mt-5">
    <tr>

        <th class="col-md-2">Descrição</th>
        <th class="col-md-2">Responsável</th>
        <th class="col-md-2">Área</th>
        <th class="col-md-1">Início</th>
        <th class="col-md-1">Término</th>
        <th class="col-md-1">Prioridade</th>
        <th class="col-md-1">Status</th>
        <th class="col-md-1">Editar</th>
        <th class="col-md-1">Excluir</th>
    </tr>


    <tr>
        <?php
        $selecao_tabela = mysqli_query($conexao, "select * from tabela_plano_de_acao_temp WHERE codigo_rnc='$id'");
        while ($registros_tabela = mysqli_fetch_array($selecao_tabela)) {
        ?>
            <td class="col-md-2"><?php echo $registros_tabela['descricao'] ?></td>
            <td class="col-md-2"><?php echo $registros_tabela['responsavel'] ?></td>
            <td class="col-md-2"><?php echo $registros_tabela['area'] ?></td>
            <td class="col-md-1"> <?php
                                    $data_id = $registros_tabela['data_prevista_conclusao'];

                                    $ano = substr($data_id, 0, 4);
                                    $mes = substr($data_id, 5, 2);
                                    $dia = substr($data_id, 8, 2);

                                    $data_id = str_replace('-', '/', $data_id);

                                    echo $dia . "/" . $mes . "/" . $ano;

                                    ?></td>
            </td>
            <td class="col-md-1"><?php
                                    $data_id = $registros_tabela['data_conclusao'];

                                    $ano = substr($data_id, 0, 4);
                                    $mes = substr($data_id, 5, 2);
                                    $dia = substr($data_id, 8, 2);

                                    $data_id = str_replace('-', '/', $data_id);

                                    echo $dia . "/" . $mes . "/" . $ano;

                                    ?></td>
            <td class="col-md-1"><?php echo $registros_tabela['prioridade'] ?></td>
            <td class="col-md-1"><?php echo $registros_tabela['status'] ?></td>
            <td class="col-md-1" style="text-align:center;"><a class="pointer" onClick="EditarPlanoTemp(<?php echo $registros_tabela_acao['id'] ?>)" data-toggle="modal" data-target="#editarPlanoAcao">
                    <span class="fa fa-edit"></span></a></td>

            <td class="col-md-1"><i class="fa fa-trash pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td>
    </tr>

<?php } ?>

</table>



<div class="modal fade" id="editarPlanoAcao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999999999">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloEditarControle">
                    Editar Plano de Ação
                </h5>



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="resposta-editar-plano-acao"></div>


            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>



<script>
    function EditarPlanoTemp(codigo) {
        $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo,
            url: 'funcoes/carregar-editar-plano-acao.php',
            success: function(retorno) {
                // location.reload()
                $g('#resposta-editar-plano-acao').html(retorno)
            }
        })
    }



    function AtualizarPlanoAcao(codigo) {

        var plano_acao = $g('#editar-desc-plano-acao').val()
        var inicio = $g('#editar-inicio-plano-acao').val()
        var termino = $g('#editar-termino-plano-acao').val()
        var status_plano_acao = $g('#editar-area-plano-acao').val()
        var prioridade_plano_acao = $g('#editar-prioridade-plano-acao').val()
        var area_plano_acao = $g('#editar-area-plano-acao').val()
        var responsavel_plano_acao = $g('#editar-responsavel-plano-acao').val()






        $g.ajax({
            type: 'post',
            data: 'codigo=' + codigo + '&plano_acao=' + plano_acao,
            url: 'funcoes/atualizar-plano-acao.php',
            success: function(retorno) {
                // CarregarTabelaControlesExistentes()
                location.reload()
            }
        })


    }
</script>