    <?php
    
   session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
    
            mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
        $selecao_sequencia=mysqli_query($conexao,"select * from medida_tratamento order by id DESC");
        $registros_sequencia=mysqli_fetch_array($selecao_sequencia);
        $valor_sequencia=$registros_sequencia['id'];
        
       if(isset($valor_sequencia)){$valor_sequencia=$valor_sequencia+1;}else{
       $valor_sequencia=1;
       }

        
        ?>
        
       
              <label>ID</label>
              <input type="number" class="form-control" name="cad-sequencia-tratamento" id="cad-sequencia-tratamento" value="<?php echo $valor_sequencia ?>" readonly>
       