<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$codigo_matriz = $_POST['codigo_matriz'];
// $codigo_usuario = $_POST['usuario'];
?>

<div class="table-responsive">

    <table id="example2" class="display mt-8" style="width:100%">
        <thead>
            <tr>
                <th>Risco Inerente</th>
                <th>Risco Residua</th>
                <th>Risco Futuro</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selecao = mysqli_query($conexao, "select * from identificacao_do_risco WHERE codigo_area='$exibir_area_principal' ");
            while ($registros_matriz = mysqli_fetch_array($selecao)) {
                $classificacao_risco = $registros_matriz['classificacao_risco'];
                $id = $registros_matriz['id']
            ?>
                <tr>



                    <?php
                    $selecao_risco_inerente = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$id'");
                    $registros_inerente = mysqli_fetch_array($selecao_risco_inerente);
                    ?>

                    <td> <?php echo $registros_inerente['nivel'] ?></a></td>



                    <?php
                    $id = $registros_matriz['id'];
                    $selecao_risco_residual = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$id'");
                    $registros_residual = mysqli_fetch_array($selecao_risco_residual);
                    ?>

                    <td> <?php echo $registros_residual['nivel'] ?></a></td>



                    <?php
                    $id = $registros_matriz['id'];
                    $selecao_risco_futuro = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$id'");
                    $registros_futuro = mysqli_fetch_array($selecao_risco_futuro);
                    ?>

                    <td> <?php echo $registros_futuro['nivel'] ?></a></td>




                    <!-- 
                    <td>

                        <?php
                        $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and excluir='1' ");
                        $numero_grupo = mysqli_num_rows($verificar_grupo);
                        if ($numero_grupo >= 1) {
                        ?>

                            <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirMatriz(<?php echo $registros_matriz['id'] ?>)"></i>
                        <?php } ?>


                    </td> -->


                </tr>

            <?php } ?>



            <?php
            $selecao = mysqli_query($conexao, "select * from identificacao_do_risco WHERE codigo_area='0' ");
            while ($registros_matriz = mysqli_fetch_array($selecao)) {
                $classificacao_risco = $registros_matriz['classificacao_risco'];
                $id    = $registros_matriz['id']
            ?>
                <tr>



                    <?php
                    $selecao_risco_inerente = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$id'");
                    $registros_inerente = mysqli_fetch_array($selecao_risco_inerente);
                    ?>

                    <td> <?php echo $registros_inerente['nivel'] ?></a></td>


                    <?php
                    $id = $registros_matriz['id'];
                    $selecao_risco_residual = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$id'");
                    $registros_residual = mysqli_fetch_array($selecao_risco_residual);
                    ?>

                    <td> <?php echo $registros_residual['nivel'] ?></a></td>


                    <?php
                    $selecao_risco_futuro = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$id'");
                    $registros_futuro = mysqli_fetch_array($selecao_risco_futuro);
                    ?>

                    <td> <?php echo $registros_futuro['nivel'] ?></a></td>


                    <!-- <td>

                        <?php
                        $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and excluir='1' ");
                        $numero_grupo = mysqli_num_rows($verificar_grupo);
                        if ($numero_grupo >= 1) {
                        ?>

                            <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirMatriz(<?php echo $registros_matriz['id'] ?>)"></i>
                        <?php } ?>


                    </td> -->


                </tr>

            <?php } ?>

            <?php
            $pesquisar = mysqli_query($conexao, "select * from responsaveis_areas WHERE codigo_usuario='$id_usuario' 
			 
			                            ");
            while ($registros_pesquisar = mysqli_fetch_array($pesquisar)) {
                $outras_areas = $registros_pesquisar['codigo_area'];

                $selecao22 = mysqli_query($conexao, "select * from identificacao_do_risco WHERE codigo_area='$outras_areas' ");
                $number = mysqli_num_rows($selecao22);

                while ($registros_matriz = mysqli_fetch_array($selecao22)) {
                    $id    = $registros_matriz['id'];
                    $classificacao_risco = $registros_matriz['classificacao_risco'];
                    if ($number >= 1) {
            ?>
                        <tr>


                            <?php
                            $selecao_risco_inerente = mysqli_query($conexao, "select * from avaliacao_risco_inerente WHERE codigo_matriz='$id'");
                            $registros_inerente = mysqli_fetch_array($selecao_risco_inerente);
                            ?>

                            <td>
                                <?php echo $registros_inerente['nivel'];  ?></a></td>



                            <?php
                            $id = $registros_matriz['id'];
                            $selecao_risco_residual = mysqli_query($conexao, "select * from avaliacao_risco_residual WHERE codigo_matriz='$id'");
                            $registros_residual = mysqli_fetch_array($selecao_risco_residual);
                            ?>

                            <td>
                                <?php echo $registros_residual['nivel'] ?></a></td>


                            <?php
                            $selecao_risco_futuro = mysqli_query($conexao, "select * from avaliacao_risco_futuro WHERE codigo_matriz='$id'");
                            $registros_futuro = mysqli_fetch_array($selecao_risco_futuro);
                            ?>

                            <td>
                                <?php echo $registros_futuro['nivel'] ?></a></td>



                            <!-- <td>
                                <?php
                                $verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='19' and codigo_grupo='$cod_grupo' and excluir='1' ");
                                $numero_grupo = mysqli_num_rows($verificar_grupo);
                                if ($numero_grupo >= 1) {
                                ?>

                                    <i class="fa fa-trash" style="cursor: pointer" onClick="ExcluirMatriz(<?php echo $registros_matriz['id'] ?>)"></i>

                                <?php } ?>

                            </td> -->
                        </tr>

            <?php }
                }
            } ?>




        </tbody>

    </table>
</div>

</table>

<script>
    $y = jQuery.noConflict()
    $y(document).ready(function() {
        $y('#example2').DataTable();
    });



    $y("#example2").dataTable({
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