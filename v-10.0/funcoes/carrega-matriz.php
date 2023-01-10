
<?php
   session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
?>

<table class="table table-striped">
               <tr>
                   <th>ID</th>
                   <th>Evento do risco</th>
                   <th>Origem</th>
                   <th>Fator do risco</th>
                   <th>Data</th>
                   <th>Classif. do risco</th>
                   <th>Tipo do risco</th>
                   <th></th>
               </tr>
               
                             
              <?php
	            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
              $selecao_matriz=mysqli_query($conexao,"select * from identificacao_do_risco");
              while($registros_matriz=mysqli_fetch_array($selecao_matriz)){
              ?>
               
               <tr>
                   <td><?php echo $registros_matriz['id'] ?></td>
                   <td><?php echo $registros_matriz['evento_risco'] ?></td>
                   <td><?php echo $registros_matriz['origem'] ?></td>
                   <td><?php echo $registros_matriz['fator_risco'] ?></td>
                   <td><?php echo $registros_matriz['data_id_risco'] ?></td>
                   <td><?php echo $registros_matriz['classificacao_risco'] ?></td>
                   <td><?php echo $registros_matriz['tipo_risco'] ?></td>
                   <td><a class="pointer_red" style="color:red" onClick="ExcluirMatriz(<?php echo $registros_matriz['id'] ?>)">X</a></td>
               </tr>
           <?php } ?>
           </table>