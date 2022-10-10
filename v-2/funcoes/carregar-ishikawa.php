<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo_matriz=$_POST['codigo_matriz'];
$setor=$_POST['setor'];
?>

<table class="table table-striped mt-2">
            <tr>
                <th>Causa</th>
                <th>Controle</th>
                <th></th>
            </tr>
        
        <?php
	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
        $selecao_tabela=mysqli_query($conexao,"select * from tabela_causa_efeito_temp WHERE codigo_matriz='$codigo_matriz' and setor='$setor'");
        while($registros_tabela=mysqli_fetch_array($selecao_tabela)){
        ?>
        
        <tr>
            <td><?php echo $registros_tabela['causa'] ?></td>
            <td><?php echo $registros_tabela['controle'] ?></td>

            <td><a class="pointer"  onClick="ExcluirCausa(<?php echo $registros_tabela['id'] ?>)">
				<span class="fa fa-trash"></span></a></td>
        </tr>
        
        <?php } ?>
            
        </table>   