<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
?>

<table class="table table-striped mt-2">
            <tr>  
                <th>Referência</th>
                <th>Descrição</th>
                <th></th>
			
            </tr>
        
        <?php
         mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
        $selecao_tabela=mysqli_query($conexao,"select * from requisitos_normativos order by descricao ASC");
        while($registros_tabela=mysqli_fetch_array($selecao_tabela)){
        ?>
        
        <tr>
            <td><?php echo $registros_tabela['referencia'] ?></td>
            <td><?php echo $registros_tabela['descricao'] ?></td>
            
            <td>
			
				<i class="fa fa-edit pointer" data-toggle="modal" data-target="#ModalEditar" onClick="EditarRequisito(<?php echo $registros_tabela['id'] ?>)"></i>
				
				
				<a class="pointer"  onClick="ExcluirTabelaRequisitoNorma(<?php echo $registros_tabela['id'] ?>)"> <i class="fa fa-trash"></i></a>
			
			
			
			</td>
			
        </tr>
        
        <?php } ?>
            
        </table>