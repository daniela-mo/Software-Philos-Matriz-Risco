     <?php
        session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');
        $codigo=$_POST['codigo'];
     ?>
     
     <label class="mt-4"><strong>Itens do requisito</strong></label>
        <table class="table table-striped">
<?php
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');	

$selecao=mysqli_query($conexao,"select * from requisitos_normativos WHERE id='$codigo'");
$registros=mysqli_fetch_array($selecao);


$selecao_normativos=mysqli_query($conexao,"select * from tabela_requisitos_normativos WHERE codigo_requisito='$codigo' order by numero ASC");
while($registros_normativos=mysqli_fetch_array($selecao_normativos)){
?>            
        
            <tr>
              <td><?php echo $registros['referencia'] ?></td>
                <td> <input type="checkbox" name="itens[]" value="<?php echo $registros_normativos['id'] ?>">&nbsp;&nbsp;<?php echo $registros_normativos['numero'] ?> - <?php echo $registros_normativos['requisito'] ?></td>
               
            </tr>
<?php } ?>        
        </table>
        
       <input type="button" value="Adicionar itens" class="btn btn-primary mt-4" onClick="AdicionarItens()" >