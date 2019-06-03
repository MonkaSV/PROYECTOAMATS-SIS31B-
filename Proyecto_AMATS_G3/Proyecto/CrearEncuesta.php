<div id="contenidoEncuesta">
	

<form  method="post" accept-charset="utf-8">
	<center><h2>Bienvenido a su creador de encuestas</h2></center>
	<br>
	Ingrese el nombre de su encuesta: <input type="text" name="nombreEncuesta" required><br>
	Cantidad de preguntas: <input type="number" name="numeroPreguntas" required><br>
	Comentario: <textarea name="comentario"></textarea><br>
	Tipo de encuesta: <input type="text" name="tipoEncuesta" required><br>
	Fecha de creacion: <input type="datetime" name="fechaCreacion" readonly  value="<?php echo date("Y-m-d");?>"><br>
	Fecha de Inicio de la encuesta: <input type="datetime-local" name="fechaInicio" required><br>
	Fecha de Finalizacion de la encuesta: <input type="datetime-local" name="fechaFin" required><br>
	<input type="submit" name="crear" value="Crear encuesta">
	
</form>
</div>
<?php

session_start();
require_once("Conexion.php");

if (isset($_POST["crear"])) {

	


	$_SESSION["nombre"]=$_POST["nombreEncuesta"];
	$_SESSION["numeroPreguntas"]=$_POST["numeroPreguntas"];
	$_SESSION["comentario"]=$_POST["comentario"];
	$_SESSION["tipoEncuesta"]=$_POST["tipoEncuesta"];
	$_SESSION["fechaCreacion"]=$_POST["fechaCreacion"];
	$_SESSION["fechaInicio"]=$_POST["fechaInicio"];
	$_SESSION["fechaFin"]=$_POST["fechaFin"];



		require_once ("transaccionesBD.php");
	$tran= new transaccionBD();
	$sql="SELECT ID_encuesta FROM encuesta ORDER BY ID_encuesta DESC LIMIT 1";
	$conn=new Conexion();
	$conn->consultar($sql);
	$extraido=mysqli_fetch_array($conn->consultar($sql));

	$idEncuesta=$extraido[0];
	$idEncuesta++;
	$_SESSION["idEncuesta"]=$idEncuesta;

	$tran->guardarEncuesta($idEncuesta,$_POST["nombreEncuesta"],$_POST["numeroPreguntas"],$_POST["comentario"],$_POST["tipoEncuesta"],$_POST["fechaCreacion"],$_POST["fechaInicio"],$_POST["fechaFin"]);

	echo '<script>
		alert("Encuesta guardada con exito");
	 location.href="?p=clases/encuesta.php";
	 </script>';

}



?>