<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

<style>
	#form-buscar::-webkit-input-placeholder {
		color: #031335;
		font-family: 'Open Sans';
		font-weight: 500;

	}
</style>

<?php
session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');

$usuario = $_SESSION['usuario'];

$selecao = mysqli_query($conexao, "select * from usuarios WHERE login='$usuario'");
$registros = mysqli_fetch_array($selecao);
$tipo = $registros['tipo'];

if ($obterdominio == 'flextronics.com.br') {
	$obterdominio = 'FLEXTRONICS INTERNATIONAL TECNOLOGIA LTDA';
}
if ($obterdominio == 'positivo.com.br') {
	$obterdominio = 'POSITIVO TECNOLOGIA S.A.';
}
if ($obterdominio == 'ambev.com.br') {
	$obterdominio = 'AMBEV S.A';
}
if ($obterdominio == 'epson.com.br') {
	$obterdominio = 'EPSON DO BRASIL INDUSTRIA E COMERCIO LIMITADA';
}
if ($obterdominio == 'nexaresources.com.br') {
	$obterdominio = 'NEXA RECURSOS MINERAIS S.A.';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav" style="background-color:#F2F2F2">
	<a class="navbar-brand logo" href="inicio.php" style="color:#1D2B4A">

		<?php echo $obterdominio ?>
	</a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCurso" aria-control="navbarCurso" aria-expanded="false" aria-label="Navegação Toggle">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="navbarCurso" class="collapse navbar-collapse">


		<ul class="navbar-nav ml-auto">




			<li class="nav-item pt-2">
				<form class="form-inline my-2 my-lg-0 mr-lg-2">
					<div class="input-group">

					</div>
				</form>
			</li>


			<li class="nav-item mr-5  pl-3 pr-2">

				<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


			</li>





		</ul>

	</div>
</nav>

<div class="row" style="background-color:#031335 ">
	<div class="col-md-12" style="height: 70px">
	</div>
</div>