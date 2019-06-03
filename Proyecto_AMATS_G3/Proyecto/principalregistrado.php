
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
		/*
if (isset($_SESSION["Nombre"])){
	if ($_SESSION["nombre_cliente"]["Clave"]=='123'){
		echo "Bienvenido ".$_SESSION["correo"]["nombre_cliente"].
		"(".$_SESSION["nombre_cliente"]["Clave"].").";

	}else{
			header("Location:Inicio.php");
	}
}else{
		header("Location:Inicio.php");
}*/
?>
		<h1>Sistema de Encuestas</h1>
	</section>

	<nav class="navegacion">
		<ul class="menu">

			<li class="first-item">
				<a href="Principaluser.php">
					<img src="img/home.jpg" alt="" class="imagen">
					<span class="text-item">Inicio</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="?p=Encuestasuser.php">
					<img src="img/votacion.png" alt="" class="imagen">
					<span class="text-item">Encuestas</span>
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
				<a href="inicio.php">
					<img src="img/cerrarsesion.png" alt="" class="imagen">
					<span class="text-item">Cerrar Sesion</span>
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