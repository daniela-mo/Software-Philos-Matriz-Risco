
<?php
    session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
?>

<table class="table table-striped mt-5 mb-4">
                   <tr>
                       <th>N°</th>
                       <th>Requisito Normativo</th>
                       <th></th>
                   </tr>
                   
             
                <?php
                mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
                    $selecao_req=mysqli_query($conexao,"select * from tabela_requisitos_normativos_temp order by numero ASC");
                    while($registros_req=mysqli_fetch_array($selecao_req)){
                ?>
                
                <tr>
                    <td><?php echo $registros_req['numero'] ?></td>
                    <td><?php echo $registros_req['requisito'] ?></td>
                     <td><a class="pointer" onClick="ExcluirReq(<?php echo $registros_req['id'] ?>)"><i class="fa fa-trash"></i></a></td>
                </tr>
                
                <?php } ?>
                   
               </table>