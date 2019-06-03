 <?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<section class="title">
		<div style="margin-right: 600px"><img src="img/logo.png" width="320" height="104"></div>
 <?php
//	session_start();
	if (!isset($_SESSION['usuario'])) {
		//header('Location: inicio.php');
	}

/*if (isset($_SESSION["Nombre"])){
	if ($_SESSION["Nombre"]["Clave"]=='admin'){
		echo "Bienvenido ".$_SESSION["Apellido"]["Nombre"].
		"(".$_SESSION["Nombre"]["Clave"].").";

	}else{
			header("Location:Inicio.php");
	}
}else{
		header("Location:Inicio.php");
}*/
?>

		<h1 class="area">Sistema de Encuestas</h1>
	</section>

	<nav class="navegacion">
		<ul class="menu">

			<li class="first-item">
				<a href="Principal.php">
					<img src="img/home.jpg" alt="" class="imagen">
					<span class="text-item">Inicio</span>
					<span class="down-item"></span>
				</a>
			</li>
			<li>
				<a href="?p=Encuestas.php">
					<img src="img/votacion.png" alt="" class="imagen">
					<span class="text-item">Encuestas</span>
					<span class="down-item"></span>
				</a>
			</li>
			<li>
				<a href="?p=Encuestados.php">
					<img src="img/encuestados.png" alt="" class="imagen">
					<span class="text-item">Encuestados</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="?p=Instituciones.php">
					<img src="img/instituciones.png" alt="" class="imagen">
					<span class="text-item">Instituciones</span>
					<span class="down-item"></span>
				</a>
			</li>
			
					<li>
				<a href="?p=Carreras.php">
					<img src="img/carreras.png" alt="" class="imagen">
					<span class="text-item">Carreras</span>
					<span class="down-item"></span>
				</a>
			</li>
		<li>
				<a href="?p=Estadisticas.php">
					<img src="img/estadisticas.png" alt="" class="imagen">
					<span class="text-item">Estadisticas</span>
					<span class="down-item"></span>
				</a>
			</li>
			<li>
				<a href="?p=Eperfil.php">
					<img src="img/editarperfil.png" alt="" class="imagen">
					<span class="text-item">Editar Perfil</span>
					<span class="down-item"></span>
				</a>
			</li>
			<li>
				<a href="?p=ca.php">
					<img src="img/ca.png" alt="" class="imagen">
					<span class="text-item">Año</span>
					<span class="down-item"></span>
				</a>
			</li>
				<li>
				<a href="Acceso.php?cerrar=true">
					<img src="img/cerrarsesion.png" alt="" class="imagen">
					<span class="down-item"><font color="white">Cerrar Sesion</font></span>
					<span class="down-item"></span>
				</a>
			</li>
		</ul>
	</nav>
</body>
</html>

	<div ><b>
	<font style="background: rgba(75, 125, 211, 0.7);">
<?php
if(isset($_GET["p"])){
		require_once($_GET["p"]);
			echo "<br>";

	}else{
	echo "<br><h2> Bienvenidos</h2>";
	}
?>
	
</font>
</b></div>