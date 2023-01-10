<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
?>

<table class="table table-striped mt-2">
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th></th>
            </tr>
        
        <?php
        $selecao_tabela=mysqli_query($conexao,"select * from classificacao_documento");
        while($registros_tabela=mysqli_fetch_array($selecao_tabela)){
        ?>
        
        <tr>
            <td><?php echo $registros_tabela['sigla'] ?></td>
            <td><?php echo $registros_tabela['descricao'] ?></td>
            <td><?php echo $registros_tabela['tipo_documento'] ?></td>
            <td>
				
			<i class="fa fa-edit pointer" data-toggle="modal" data-target="#ModalEditarClassificacao" onClick="EditarClassificacaoDocumento(<?php echo $registros_tabela['id'] ?>)"></i>	
				
				
				<a class="pointer" onClick="ExcluirTabelaRequisito(<?php echo $registros_tabela['id'] ?>)"><i class="fa fa-trash"></i></a>
			
			
			
			</td>
        </tr>
        
        <?php } ?>
            
        </table>