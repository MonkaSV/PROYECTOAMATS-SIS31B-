

<script type="text/javascript">
	
 function dibujar(){ 
      
     var texto=document.getElementById("numero").value; 
      
     if(window.XMLHttpRequest){ 
         objetoAjax=new XMLHttpRequest(); 
     } 
     objetoAjax.onreadystatechange=function(){ 
         if(objetoAjax.readyState==4 && objetoAjax.status==200){ 
             document.getElementById("respuesta").innerHTML=objetoAjax.responseText; 
         } 
     } 
     objetoAjax.open("POST","js/ajax.php",true); 
     objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     objetoAjax.send("texto2="+ texto +""); 
     //document.write(texto);
 } 
     

</script>

<center><h1>AQUI SE CREARAN LAS ENCUESTAS</h1>
	<br>
<form method="POST">
	
	Ingrese su pregunta: <input type="text" name="pregunta" value="" placeholder=""><br>
	Ingrese el numero de respuestas <input type="number" name="numero" id="numero" value="" onkeyup="dibujar()" placeholder=""><br>
	Tipo de Pregunta: <select name="tipo"><option value="checkbox" disabled selected>Seleccionar</option>
		<option value="Cerrada">Cerrada</option>
		<option value="Abierta">Abierta</option>
		<option value="Multiple">Selecion Multiple</option>
		<option value="Unica">Una Opcion</option>
		<option value="Tcorto">Texto Corto</option>
		<option value="Tlargo">Texto Largo</option>
		<option value="radio">De Prueba</option>
		<option value="Clarificacion">Clarificacion</option>
		<option value="Sugerencia">De Sugerencia</option>
		<option value="Definitiva">Definitiva</option>
		option
	option</select>respuestas: <br>
	<div id="respuesta">
		
		

	</div>
	<input type="submit" name="ok" value="Confirmar datos">
</form>



<?php
//require_once("../Conexion.php");
require_once("Conexion.php");
$conn=new Conexion();
$conn->Conexion();
session_start();


		if (isset($_SESSION["numeroPreguntas"])) {
	if (isset($_POST["ok"])) {

			


		echo "<br> ";
		$pregunta=$_POST["pregunta"];
		$numero=$_POST["numero"];
		$tipo=$_POST["tipo"];
		$respuestas=$_POST["respuestas"];

		if ($pregunta == "") {
			echo "<script  language='javascript'>alert('Debe Crear Por lo Menos Una Pregunta !');</script>";
		}else{

			echo $pregunta."<br>";

			echo "Respuestas: <br>";
			//var_dump($tipo);
			//AQUI IMPRIMO LAS RESPUESTAS A MODO DE VISTA PREVIA
			switch ($tipo) {
				case 'checkbox':
					for ($i=0; $i < $numero; $i++) { 
						echo '<input type="checkbox" name="" value="'.$respuestas[$i].'" readonly>'.$respuestas[$i].'<br>';					
					}
					break;
				case 'Unica':
					for ($i=0; $i < $numero; $i++) { 
						echo '<input type="radio" name="aloha" value="'.$respuestas[$i].'" readonly>'.$respuestas[$i].'<br>';					
					}
					break;

				case 'radio':
					for ($i=0; $i < $numero; $i++) { 
						echo '<input type="radio" name="aloha" value="'.$respuestas[$i].'" readonly>'.$respuestas[$i].'<br>';					
					}
					break;
				case 'Cerrada':

					echo '
					<input type="radio" name="cerrar" value="Si">Si   <input type="radio" name="cerrar" value="No">No<br>
					';
					# code...
					break;
				case 'Abierta':
					echo '
					Ingrese su respuesta: <br>
					<input type="text" name="" value="" placeholder=""><br>
					';
					# code...
					break;
				case 'Multiple':
					for ($i=0; $i < $numero; $i++) { 
						echo '<input type="checkbox" name="yo" value="'.$respuestas[$i].'" readonly>'.$respuestas[$i].'<br>';					
					}
					# code...
					break;

				case 'Tcorto':

					echo '<input type="text" name="resp" value="" placeholder="Escriba aqui su respuesta">';
					# code...
					break;

				case 'Tlargo':
						echo '<textarea name="">Escriba aqui su respuesta</textarea>';
					# code...
					break;
				
				default:
					# code...
					break;
			}

	}

			//guardamos en la BD
			//NADA DE ESTO ES VISIBLE, EXCEPTO EL BOTON DE CONTINUAR
			

			require_once ("transaccionesBD.php");
			$tran= new transaccionBD();
			$sql="SELECT ID_respuesta FROM respuestas ORDER BY ID_respuesta DESC LIMIT 1";
			$conn->consultar($sql);
			$extraido=mysqli_fetch_array($conn->consultar($sql));

			$id=$extraido[0];
			$id++;



			$sql="SELECT ID_tipo FROM tipo_preguntas WHERE tipo_pregunta='$tipo'";
			$id_tipo=mysqli_fetch_array($conn->consultar($sql));

			$sql="SELECT ID_pregunta FROM preguntas ORDER BY ID_pregunta DESC LIMIT 1";
			$id_pregunta=mysqli_fetch_array($conn->consultar($sql));

		//echo $id_pregunta[0];
		//echo "<br>".$id_tipo[0];
			$id_pregunta[0]=$id_pregunta[0]+1;
			for ($i=0; $i < $numero; $i++) { 
				$tran->agregarRespuesta($id,$respuestas[$i]);		
					
					$tran->guardarRespuestaxPregunta($id_pregunta[0],$id);
					

				$id++;
						}
			$tran->agregarPreguntaNormal($id_pregunta[0],$pregunta,$id_tipo[0],$numero);

			if (isset($_SESSION["contadorPreguntas"])) {
				$contadorPreguntas=$_SESSION["contadorPreguntas"];
				$contadorPreguntas++;
				$_SESSION["contadorPreguntas"]=$contadorPreguntas;
			}
			else {
				$_SESSION["contadorPreguntas"]=1;
			}
			$contadorPreguntas=$_SESSION["contadorPreguntas"];
			echo "<h1> $contadorPreguntas </h1>";
			$npreg=$tran->numeroPreguntasxEncuesta($id_pregunta[0]);
			$npreg=mysqli_fetch_row($npreg);

			$npreg=$_SESSION["numeroPreguntas"];

		$idEncuesta=$_SESSION["idEncuesta"];
		$tran->guardarEncuestaxPregunta($idEncuesta,$id_pregunta[0]);



			
			if ($contadorPreguntas>=$npreg[0]) {
				echo "<script>

				alert('Todas las preguntas han sido creadas');
				location.href='Principal.php';
				</script>";

				//esto podria hacer que falle el inicio de sesion
				session_destroy();
				unset($_SESSION["contadorPreguntas"]);
			}
			else{
			echo '<form  method="POST" accept-charset="utf-8">
				<input type="submit" name="nueva" value="Siguiente pregunta">
				
			</form>';
			}

		}




	elseif (isset($_POST["nueva"])) {
		$idEncuesta=$_SESSION["idEncuesta"];
		$tran->guardarEncuestaxPregunta($id,$idEncuesta);

	}}



		else{
			echo "<script>alert('No se pase de listo y primero cree la encuesta');</script>";
			echo "<script>location.href='Principal.php';</script>";
		}

?>
</center>