<table class="table table-striped">
<?php	
session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');
	
$codigo=$_POST['codigo'];	

$selecao=mysqli_query($conexao,"select * from upload_temp_workflow");
while($registros=mysqli_fetch_array($selecao)){
?>


		<tr>
			<td><img src="imgs/icone-documento.png" width="15" height="17" alt=""/> <?php echo $registros['arquivo'] ?></td>
			<td>Arquivo enviado em: <?php echo $registros['data'] ?> - <?php echo $registros['hora'] ?></td>
			<td class="text-danger" style="cursor: pointer" onClick="DeletarAnexo(<?php echo $registros['id'] ?>)"><strong>X</strong></td>
		</tr>				
	

<?php } ?>
	
	

	
	</table>	