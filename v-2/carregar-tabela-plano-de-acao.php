<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
?>


<table class="table table-striped mt-5">
            <tr>
                <th>Item</th>
                <th>Descrição</th>
                <th>Como Fazer?</th>
				<th>Responsável</th>
				<th>Data Prevista</th>
				<th>Data Conclusão</th>
				
                <th>Ação</th>
            </tr>
        
        <?php
        $selecao_tabela=mysqli_query($conexao,"select * from tabela_plano_de_acao");
        while($registros_tabela=mysqli_fetch_array($selecao_tabela)){
        ?>
        
        <tr>
            <td><?php echo $registros_tabela['item'] ?></td>
            <td><?php echo $registros_tabela['descricao'] ?></td>
            <td><?php echo $registros_tabela['como_fazer'] ?></td>
			 <td><?php echo $registros_tabela['responsavel'] ?></td>
			 <td><?php echo $registros_tabela['data_prevista_conclusao'] ?></td>
			 <td><?php echo $registros_tabela['data_conclusao'] ?></td>
           <td><i class="fa fa-trash pointer" onClick="ExcluirPlanoTemp(<?php echo $registros_tabela['id'] ?>)"></i></td>
        </tr>
        
        <?php } ?>
            
        </table>