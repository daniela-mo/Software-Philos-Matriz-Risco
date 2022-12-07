<?php

session_start();
$obterdominio = $_SESSION['dominio'];
include($obterdominio . '/' . 'conexao.php');

if ($obterdominio == 'flextronics.com.br') {
	$obterdominio = 'Flextronics';
}
if ($obterdominio == 'positivo.com.br') {
	$obterdominio = 'Positivo';
}
if ($obterdominio == 'nexasources.com.br') {
	$obterdominio = 'Nexa';
}
if ($obterdominio == 'tasklogistics.com.br') {
	$obterdominio = 'Task';
}
if ($obterdominio == 'ambev.com.br') {
	$obterdominio = 'Ambev';
}
if ($obterdominio == 'epson.com.br') {
	$obterdominio = 'Epson';
}
@$usuario = $_SESSION['usuario'];

if (isset($_SESSION['usuario'])) {
} else { ?>

	<script>
		location.href = 'index.php'
	</script>

<?php
}



$selecao = mysqli_query($conexao, "select * from usuarios_empresa WHERE email='$usuario'");
$registros = mysqli_fetch_array($selecao);
$tipo = $registros['tipo'];
$id_usuario = $registros['id'];
$cod_grupo = $registros['grupo'];
$user_email = $registros['email'];
?>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
<style>
	#form-buscar::-webkit-input-placeholder {
		color: #031335;
		font-family: 'Open Sans';
		font-weight: 500;

	}

	#brand-logo2 {
		display: none;
	}

	input {
		'type=search';
	}

		{
		border: solid;
	}

	body {
		font-family: Open Sans;
		color: #031335;
	}

	.sidenav-second-level li {
		padding: 0px;
		margin: 0px;
		height: 40px;
	}
</style>

<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav" style="background-color:#F2F2F2; color:black">

	<img src="imgs/logo-transparente-m2v2.png" id="brand-logo2" width="35" height="35" alt="" />


	<a class="navbar-brand" href="dashboard.php">

		<span class="cor-texto-padrao" id="brand-logo" style="margin-left: 70px;z-index: 9999999999999999999999999999999999999999999999999999;position: absolute; background-color: white; border-radius:40px;padding: 5px; margin-top: -10px; text-align: center">

			<img src="imgs/logo-transparente-m2v2.png" id="logo-principal" width="65" height="65" alt="" style="z-index: 99999999999999999999999999999999999999999999999999999; " />

		</span>

	</a>

	<a id="sidenavToggler" class="nav-link text-center" style="color:#031335; margin-left: -80px" onClick="Logo()">
		<i class="fa fa-fw fa-bars fa-2x"></i>
	</a>





	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCurso" aria-control="navbarCurso" aria-expanded="false" aria-label="Navegação Toggle" onClick="Logo()">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div id="navbarCurso" class="collapse navbar-collapse">


		<ul class="navbar-nav navbar-sidenav" id="linksaccordion" style="height: 100vh">

			<li class="nav-item" data-toggle="tooltip" data-placement="right" style="margin-top: 50px">
				<a class="nav-link nav-link-collapse collapse" href="#dashboards" data-toggle="collapse" data-parent="#linksaccordion">
					<img src="imgs/principal-dashboard.fw.png" width="15" height="15" />
					<span class="nav-link-text">Dashboard</span>
				</a>


				<ul class="sidenav-second-level collapse" id="dashboards">
					<li>
						<a href="dashboard.php" id="menu-dashboard">
							Dashboard
						</a>
					</li>

					<li>
						<a href="dashboard-periodo.php" id="menu-dashboard-periodo">
							Dashboard por Período
						</a>
					</li>
				</ul>

			</li>





			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapse" href="#cadastros" data-toggle="collapse" data-parent="#linksaccordion" id="menu-principal-cadastro">
					<img src="imgs/icon-user-white.png" width="15" height="15" />
					<span class="nav-link-text">Cadastro</span>
				</a>
				<ul class="sidenav-second-level collapse" id="cadastros">






					<li>
						<a href="empresas.php" id="menu-empresas">
							Empresa(s)
						</a>
					</li>



					<li>
						<a href="organogramas.php" id="menu-organograma">Organogramas</a>
					</li>


					<li>
						<a href="niveis-permissoes.php" id="menu-nives-permissao">Níveis de Permissões</a>
					</li>






				</ul>
			</li>




			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapse" href="#sistema" data-toggle="collapse" data-parent="#linksaccordion">
					<img src="imgs/icone-sistema-white.fw.png" width="15" height="15" />
					<span class="nav-link-text">Sistema</span>
				</a>
				<ul class="sidenav-second-level collapse" id="sistema">




					<li>
						<a href="usuarios.php" id="menu-usuarios">Usuários</a>
					</li>


					<li>
						<a href="historico-acesso.php" id="menu-historicos">Histórico de Acesso</a>
					</li>



					<?php
					if ($obterdominio == 'braol.com.br' or $obterdominio == 'm2v.com.br') {
					?>


						<li class="nav-item" data-toggle="tooltip" data-placement="right"><a href="limpar-sistema.php">
								Limpar Sistema
							</a></li>


					<?php } ?>


				</ul>
			</li>




			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapse" href="#riskassesment" data-toggle="collapse" data-parent="#linksaccordion">
					<img src="imgs/sistema-branco.fw.png" width="15" height="15" />
					<span class="nav-link-text">Módulo OEA</span>
				</a>
				<ul class="sidenav-second-level collapse" id="riskassesment">


					<li>
						<a href="cadastros.php" id="menu-cadastro-certificacao">Cad. de Certificação</a>
					</li>

					<!---<li>
							<a href="implementacoes.php">Implementação</a>
						</li>--->




					<li>
						<a href="qaas.php" id="menu-qaa">QAA</a>
					</li>







				</ul>

			</li>




			<li class="nav-item">
				<a class="nav-link " href="workflow.php" id='workflow'>
					<img src="imgs/workflow-branco.fw.png" width="15" height="15" />
					<span class="nav-link-text" id="menu-workflow">Workflow de Atividades</span>
				</a>

			</li>





			<!----<li class="nav-item" >
					<a class="nav-link " href="minhas-areas.php">
						<img src="imgs/menu-icon4.png" width="21"  />
						<span class="nav-link-text">Minhas áreas</span>
					</a>
					
				</li>
				----->


			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapse" href="#gestaodeprocessos" data-toggle="collapse" data-parent="#linksaccordion">
					<img src="imgs/principal-gestao-de-processos.fw.png" width="15" height="15" />
					<span class="nav-link-text">Gestão de Processos</span>
				</a>
				<ul class="sidenav-second-level collapse" id="gestaodeprocessos">




					<li>
						<a href="processos.php" id="menu-processos">Cadastro de Processos</a>
					</li>



					<li>
						<a href="documentos.php" id="menu-documentos">Cadastro de Docs.</a>
					</li>





				</ul>
			</li>




			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapse" href="#gestaoderisco" data-toggle="collapse" data-parent="#linksaccordion">
					<img src="imgs/icone-risco-branco.png" width="15" height="15" />
					<span class="nav-link-text">Gestão de Risco</span>
				</a>
				<ul class="sidenav-second-level collapse" id="gestaoderisco">





					<li>
						<a href="parametrizacao.php" id="menu-parametrizacao">Parametrização</a>
					</li>





					<!--	
						<li>
							<a href="escopos.php" id="menu-escopos">Escopo</a>
						</li>
						-->




					<!-- 
					<li>
						<a href="swots.php" id="menu-contextos">SWOT</a>
					</li> -->




					<li>
						<a href="matriz-de-riscos.php" id="menu-matrizderiscos">Proc. Aval. de Risco</a>
					</li>






					<li>
						<a href="monitoramento.php" id="menu-monitoramento">Comitê</a>
					</li>



				</ul>
			</li>



			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapse" href="#naoconformidade" data-toggle="collapse" data-parent="#linksaccordion">
					<img src="imgs/n-conformidade2.png" width="15" height="15" />
					<span class="nav-link-text">Não Conformidade</span>
				</a>
				<ul class="sidenav-second-level collapse" id="naoconformidade">





					<li>
						<a href="rncs.php" id="menu-rncs">RNC</a>
					</li>






					<li>
						<!-- <a href="8ds.php" id="menu-8d">8D</a> -->
					</li>


				</ul>
			</li>





			<li></li>

		</ul>

		<ul class="navbar-nav ml-auto">


			<li class="nav-item">
				<form class="form-inline my-2 my-lg-0 mr-lg-2">
					<div class="input-group">
						<input type="text" class="form-control bg-cinza" placeholder="Buscar..." id="form-buscar" style="background-color: #E4E4E4;">
						<span class="input-group-btn">
							<button class="btn bg-cinza" type="button" id="btn-buscar">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
			</li>

			<li class="nav-item ml-4 pl-3 pr-2 pt-2" style="border-left:solid 1px #CACACA">
				<img src="imgs/superior-envelope-azul.png" class="icone-custom" width="23" alt="" />
			</li>



			<li class="nav-item mr-3 pl-2 pr-3 pt-2" style="border-right:solid 1px #CACACA">
				<a href="notificacoes.php"><img src="imgs/superior-alerta-blue.png" class="icone-custom" width="20" alt="" />
				</a>
				<?php
				$selecao2 = mysqli_query($conexao, "select * from notificacoes WHERE codigo_usuario='$id_usuario'");
				$numero = mysqli_num_rows($selecao2);
				if ($numero == 0) {
				} else { ?>


					<div style=" z-index: 9999999999; position: absolute; top:5px; background-color:red; color:white; border-radius:20px; padding: 2px 7px 2px 7px; font-size: 9px; margin-left: 25px; font-weight: bold">
						<?php echo $numero ?>
					</div>


				<?php }  ?>

			</li>

			<li class="nav-item mr-5  pl-2 pr-2" style="margin-top:-5px">

				<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

					<img src="imgs/m2v2.png" class="boasvindas-custom" alt="" />
					<span class="texto-boasvindas" style="color:#545C52;font-family: OpenSansSemiBold"> <?php echo $usuario ?></span> </a>


				<div class="dropdown-menu dropdown-menu-right animated flipInY" style="z-index: 99000; margin-top: 35px; margin-right: 10px">
					<!-- text-->
					<a href="meu-perfil.php" class="dropdown-item"><i class="ti-user"></i> Meu Perfil</a>

					<div class="dropdown-divider"></div>

					<a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Sair</a>
					<!-- text-->
				</div>
			</li>





		</ul>



	</div>
</nav>


<script src="bibliotecas/jquery/jquery.min.js"></script>

<script>
	$w = jQuery.noConflict()



	function Logo() {
		$w('#brand-logo').toggle()
		$w('#brand-logo2').toggle()
	}
</script>