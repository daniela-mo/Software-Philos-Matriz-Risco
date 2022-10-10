<link rel="shortcut icon" href="imgs/favicon2.fw.png" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

<style>
#form-buscar::-webkit-input-placeholder{
     color:#031335;
font-family: 'Open Sans';
font-weight:500;	

}

</style>

<?php
session_start();
$obterdominio=$_SESSION['dominio'];
include($obterdominio.'/'.'conexao.php');

$usuario=$_SESSION['usuario'];

$selecao=mysqli_query($conexao,"select * from usuarios WHERE login='$usuario'");
$registros=mysqli_fetch_array($selecao);
$tipo=$registros['tipo'];

if($obterdominio=='flextronics.com.br'){$obterdominio='Flextronics';}
if($obterdominio=='positivo.com.br'){$obterdominio='Positivo';}
?>

<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav" style="background-color:#F2F2F2" >
		<a class="navbar-brand logo" href="inicio.php" style="color:#1D2B4A">
	
	<?php echo $obterdominio?>
	</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
		data-target="#navbarCurso" aria-control="navbarCurso" aria-expanded="false" aria-label="Navegação Toggle">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navbarCurso" class="collapse navbar-collapse" >
			
			
			<ul class="navbar-nav ml-auto" >
				
				
				
				
								<li class="nav-item pt-2">
					<form class="form-inline my-2 my-lg-0 mr-lg-2">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar..." id="form-buscar" style="color:031335">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="button" id="btn-buscar">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</li>
				
			  
				
				<li class="nav-item mt-2  ml-4 mr-1  pt-2 pl-3" style="border-left:solid 1px #CACACA">
					<img src="imgs/superior-envelope-azul.png" class="icone-custom" width="25"  alt=""/>
				</li>
				
			  <li class="nav-item mr-2 pl-2 pr-2 mt-2 ml-1 mr-1  pt-2 pl-2  pr-3" style="border-right:solid 1px #CACACA">
					<img src="imgs/superior-alerta-blue.png" class="icone-custom" width="23"  alt=""/>
				</li>

			 	  <li class="nav-item mr-5  pl-3 pr-2">
				  
				  <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  
					<img src="imgs/logo2.jpg" width="30" class="boasvindas-custom"  alt=""  /> 
					  <span class="texto-boasvindas"  style="color:#545C52;font-family: OpenSansSemiBold"> <?php echo $usuario ?></span> </a>
				  
				  
				   <div class="dropdown-menu dropdown-menu-right animated flipInY" style="z-index: 99000; margin-top: 0px" >
                                <!-- text-->
                                <a href="meu-perfil.php" class="dropdown-item" ><i class="ti-user"></i> Meu Perfil</a>
                                
                                <div class="dropdown-divider"></div>
                               
                                <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Sair</a>
                                <!-- text-->
                            </div>
				</li>

			
				
				
				
			</ul>

		</div>
	</nav>
	
	<div class="row" style="background-color:#031335 ">
		<div class="col-md-12" style="height: 70px">
		</div>	
	</div>