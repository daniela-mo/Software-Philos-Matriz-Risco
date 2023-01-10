
<?php
   session_start();
$obterdominio=$_SESSION['dominio'];
include('../'.$obterdominio.'/'.'conexao.php');
$codigo=$_POST['codigo'];
$data=$_POST['data'];
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');

$selecao=mysqli_query($conexao,"select * from identificacao_do_risco WHERE id='$codigo'");
while($registros=mysqli_fetch_array($selecao)){
 $data= $registros['data_id_risco'];
			$ano = substr($data,0,4);
			$mes = substr($data,5,2);
			$dia = substr($data,8,2);
			

?>

<div class="col-md-4">
	<label>Data de Id.(Em ajuste)</label>
 <input type="text" name="cad-editar-data-id" id="cad-editar-data-id"  class="form-control datepickerx" value="<?php echo $dia ?>/<?php echo $mes ?>/<?php echo $ano ?>" readonly  >
   
	
	
	
<input type="button" value="Atualizar Data" class="btn btn-primary mt-3" onClick="GravarEditarDataId(<?php echo $codigo ?>)" >
</div> 	

	


<?php } ?>

<script>
CarregarData()
</script>

