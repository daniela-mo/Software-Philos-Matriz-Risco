<link rel="stylesheet" type="text/css" href="bibliotecas/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bibliotecas/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="stylesheet" type="text/css" href="css/datatable.css">
<link rel="shortcut icon" href="imgs/favicon2.fw.png" />


<?php session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');
if ($obterdominio == 'flextronics.com.br') {
    $obterdominio = 'Flextronics';
}
if ($obterdominio == 'positivo.com.br') {
    $obterdominio = 'Positivo';
}
@$usuario = $_SESSION['usuario'];

if (isset($_SESSION['usuario'])) {
} else { ?>

    <script>
        location.href = 'index.php'
    </script>

<?php
}

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$selecao = mysqli_query($conexao, "select * from usuarios_empresa WHERE email='$usuario'");
$registros = mysqli_fetch_array($selecao);
$tipo = $registros['tipo'];
$id_usuario = $registros['id'];
$cod_grupo = $registros['grupo'];

?>
<div class="row ml-4 mr-4 mt-5">




    <div class="col-md-8">
        <table id="tabela" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Área</th>

                </tr>
            </thead>
            <tbody>
                <?php


                $selecao = mysqli_query($conexao, "select * from demais_areas_risco");
                while ($registros = mysqli_fetch_array($selecao)) {
                    $codigo_area = $registros['codigo_area'];

                    $selecao_areas = mysqli_query($conexao, "select * from areas WHERE id='$codigo_area'");
                    $registros_areas = mysqli_fetch_array($selecao_areas);
                ?>
                    <tr>
                        <td><?php echo $registros_areas['area']; ?></td>




                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>





</div>



<script src="bibliotecas/jquery/jquery.min.js"></script>
<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/jquery.mask.min.js"></script>




<script>
    $j("#tabela").dataTable({
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