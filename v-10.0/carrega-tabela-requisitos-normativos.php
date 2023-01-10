<?php
include("../conexao.php");
?>

<table class="table table-striped mt-2">
            <tr>
                <th>Referência</th>
                <th>Descrição</th>
               
                <th></th>
            </tr>
        
        <?php
        $selecao_tabela=mysqli_query($conexao,"select * from classificacao_documento");
        while($registros_tabela=mysqli_fetch_array($selecao_tabela)){
        ?>
        
        <tr>
            <td><?php echo $registros_tabela['sigla'] ?></td>
            <td><?php echo $registros_tabela['descricao'] ?></td>
           
           
        </tr>
        
        <?php } ?>
            
        </table>