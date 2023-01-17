<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include('../' . $obterdominio . '/' . 'conexao.php');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');


$codigo = $_POST['codigo'];
$certificado = $_POST['certificado'];
$cnpj = $_POST['cnpj'];
$mod = $_POST['mod'];
@$usuario = $_SESSION['usuario'];

$selecao = mysqli_query($conexao, "select * from usuarios_empresa WHERE email='$usuario'");
$registros = mysqli_fetch_array($selecao);
$tipo = $registros['tipo'];
$id_usuario = $registros['id'];
$cod_grupo = $registros['grupo'];

//Obter versão mais recente//
$obter_versao_atual = mysqli_query($conexao, "select * from status_qaas order by id DESC");
$registros = mysqli_fetch_array($obter_versao_atual);
$versao = $registros['versao'];
if ($versao == '') {
	$versao = 1;
}


$selecao = mysqli_query($conexao, "select * from questoes_qaa WHERE cod='$codigo'  ");
$regsitros = mysqli_fetch_array($selecao);
$id = $regsitros['id'];
$codigo_anterior = $regsitros['codigo_anterior'];


$pesquisar_respostas = mysqli_query($conexao, "select * from resposta_qaa WHERE codigo_questao='$id' and cnpj='$cnpj'");
$registros_respostas = mysqli_fetch_array($pesquisar_respostas);
$exibir_resposta = $registros_respostas['resposta'];
$exibir_sim_nao = $registros_respostas['resposta_sim_nao'];
$exibir_checkId = $resgistros_respostas['check_id'];



if ($exibir_resposta == '' and $codigo_anterior != '') {

	$pesquisar_respostas2 = mysqli_query($conexao, "select * from resposta_qaa WHERE codigo_questao='$codigo_anterior' and cnpj='$cnpj'");
	$registros_respostas2 = mysqli_fetch_array($pesquisar_respostas2);
	$exibir_resposta = $registros_respostas2['resposta'];
}

?>


<style>


</style>

<div id="resposta-alertas"></div>
<?php
$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and cadastrar='1' ");
$numero_grupo = mysqli_num_rows($verificar_grupo);
if ($numero_grupo >= 1) {
?>
	<!-- Button trigger modal -->

<?php } ?>


<input type="hidden" id="quest-codigo" value="<?php echo $regsitros['id'] ?>">
<input type="hidden" id="cad-cnpj" value="<?php echo $cnpj ?>">

<input type="hidden" id="cad-mod" value="<?php echo $mod ?>">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onClick="CarregaUsers(<?php echo $codigo ?>)">
	Aprovadores
</button>


<label class="mt-3">Questão</label>
<textarea rows="3" class="form-control textarea" id="quest-questao"><?php echo $regsitros['questao'] ?></textarea>



<?php
$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='$cod_grupo' and editar='1' ");
$numero_grupo = mysqli_num_rows($verificar_grupo);
if ($numero_grupo >= 1) {
?>
	<script>
		document.getElementById("quest-questao").readOnly = true;
		document.getElementById("edit-resposta").readOnly = false;
	</script>
<?php  } ?>



<?php
if ($regsitros['pergunta_sim_nao'] != '') {
} ?>

<label class="mt-3">

	<!--<input type="text" value="<?php echo $regsitros['pergunta_sim_nao'] ?>" class="form-control" name="cad-pergunta" id="cad-pergunta">
--->


</label>

<input type="radio" <?php if ($registros_respostas['resposta_sim_nao'] == 'Sim') { ?> checked <?php } ?> name="cad-resposta-sim-nao" id="cad-resposta-sim-nao" value="Sim"> Sim

<input type="radio" <?php if ($registros_respostas['resposta_sim_nao'] == 'Não') { ?> checked <?php } ?> name="cad-resposta-sim-nao" id="cad-resposta-sim-nao" value="Não"> Não


<label class="mt-3">Resposta</label>
<div class="row mb-2">
	<div class="col">
		<!-- Adding different buttons for
                         different functionality-->
		<!--onclick attribute is added to give 
                        button a work to do when it is clicked-->
		<button type="button" onclick="f1()" class=" shadow-sm btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Bold Text">
			Negrito</button>
		<button type="button" onclick="f2()" class="shadow-sm btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Italic Text">
			Italico</button>
		<button type="button" onclick="f3()" class=" shadow-sm btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Left Align">
			<i class="fa fa-align-left"></i></button>
		<button type="button" onclick="f4()" class="btn shadow-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Center Align">
			<i class="fa fa-align-center"></i></button>
		<button type="button" onclick="f5()" class="btn shadow-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Right Align">
			<i class="fa fa-align-right"></i></button>
		<button type="button" onclick="f6()" class="btn shadow-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Uppercase Text">
			A</button>
		<button type="button" onclick="f7()" class="btn shadow-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Lowercase Text">
			a</button>
		<!-- <button type="button" onclick="f8()" class="btn shadow-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Capitalize Text">
			Capitalize</button> -->
		<button type="button" onclick="f9()" class="btn shadow-sm btn-outline-primary side" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
			Limpar Texto</button>

	</div>
</div>
</div>

<textarea onkeyup="limite_textarea(this.value)" class="form-control" id="quest-resposta" value="<?php echo $registros_respostas['resposta']; ?><?php echo $registros_respostas['codigo_qaa'];  ?>"><?php print($registros_respostas['resposta']); ?></textarea>
<span id="cont">5000</span> Restantes <br>

<label class="mt-3">Essa resposta possui documentos ou evidências a serem anexadas?
</label>
<?php $possui = $regsitros['possui_nao_possui'];



$selecao3 = mysqli_query($conexao, "select * from upload_qaa WHERE codigo_qaa='$codigo' and cnpj='$cnpj'");
$num = mysqli_num_rows($selecao3);
if ($num >= 1) {
	$possui = 'sim';
} else {
	$possui = 'não';
}







if ($possui == '0') {
	$possui = 'não';
	$possui2 = 'Não Possui';
}
if ($possui == '') {
	$possui = 'não';
}
if ($possui == 'não') {
	$possui2 = 'Não Possui';
}
if ($possui == 'sim') {
	$possui2 = 'Possui';
}
?>

<select class="form-control mt-3 mb-4" name="cad-documentos" id="cad-documentos" onChange="Uploads()">
	<option value="<?php echo $possui ?>">
		<?php echo $possui2 ?>
	</option>






	<?php if ($possui == 'sim') { ?>
		<option value="não">Não Possui</option>
	<?php } ?>

	<?php if ($possui == 'não') { ?>
		<option value="sim">Possui</option>
	<?php } ?>

</select>








<div id="carrega-anexos-qaa"></div>



<div id="upload-arquivos"></div>

<?php
$verificar_grupo = mysqli_query($conexao, "select * from grupos_permissoes WHERE codigo_menu='10' and codigo_grupo='8' and editar='1' ");
$numero_grupo = mysqli_num_rows($verificar_grupo);
if ($numero_grupo == 1) {
?>


	<input type="button" value="salvar" class="btn btn-primary mt-1" onClick="AtualizarQAA('salvar')">

	<input type="button" value="gravar" class="btn btn-success mt-1" onClick="AtualizarQAA('gravar')">



<?php } ?>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 999999999">
	<div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 999999999">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Responsáveis</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="resposta-modal"></div>

				<div id="carregar-listar-usuarios"></div>

			</div>
			<div class="modal-footer">
				<select class="form-control" id="novo-user">
					<option value="0">Novo usuário</option>
					<?php
					$selecao_usuarios = mysqli_query($conexao, "select * from usuarios_empresa");
					while ($registros_usuarios = mysqli_fetch_array($selecao_usuarios)) {
					?>

						<option value="<?php echo $registros_usuarios['id'] ?>"><?php echo $registros_usuarios['nome'] ?>|<?php echo $registros_usuarios['email'] ?></option>

					<?php } ?>

				</select>

				<input type="button" value="Adicionar" class="btn btn-primary" onclick="AdicionarResponsavel(<?php echo $codigo ?>)">

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// CKEDITOR.replace('resposta', {





	// });


	// CKEDITOR.on('resposta', function(event) {
	// 	editor.on('configLoaded', function() {




	// 	});
	// });


	// CKEDITOR.on('instanceReady', function(ev) {
	// 	ev.resposta.on('resposta', function(evt) {

	// 	}, null, null, 9);
	// });
</script>
<script>
	function limite_textarea(valor) {
		quant = 5000;
		total = valor.length;
		if (total <= quant) {
			resto = quant - total;
			document.getElementById('cont').innerHTML = resto;
		} else {
			document.getElementById('resposta').value = valor.substr(0, quant);
		}

	}

	function f1() {
		//function to make the text bold using DOM method
		document.getElementById("quest-resposta").style.fontWeight = "bold";
	}

	function f2() {
		//function to make the text italic using DOM method
		document.getElementById("quest-resposta").style.fontStyle = "italic";
	}

	function f3() {
		//function to make the text alignment left using DOM method
		document.getElementById("quest-resposta").style.textAlign = "left";
	}

	function f4() {
		//function to make the text alignment center using DOM method
		document.getElementById("quest-resposta").style.textAlign = "center";
	}

	function f5() {
		//function to make the text alignment right using DOM method
		document.getElementById("quest-resposta").style.textAlign = "right";
	}

	function f6() {
		//function to make the text in Uppercase using DOM method
		document.getElementById("quest-resposta").style.textTransform = "uppercase";
	}

	function f7() {
		//function to make the text in Lowercase using DOM method
		document.getElementById("quest-resposta").style.textTransform = "lowercase";
	}

	// function f8() {
	// 	//function to make the text capitalize using DOM method
	// 	document.getElementById("quest-resposta").style.textTransform = "capitalize";
	// }

	function f9() {
		//function to make the text back to normal by removing all the methods applied 
		//using DOM method
		document.getElementById("quest-resposta").style.fontWeight = "normal";
		document.getElementById("quest-resposta").style.textAlign = "left";
		document.getElementById("quest-resposta").style.fontStyle = "normal";
		document.getElementById("quest-resposta").style.textTransform = "capitalize";
		document.getElementById("quest-resposta").value = " ";
	}
</script>



<script>
	$h = jQuery.noConflict()


	$h(document).ready(function() {

		var test = document.getElementById("quest-resposta").scrollHeight;



		$h('#quest-resposta').css('height', test + 300)

	})
</script>