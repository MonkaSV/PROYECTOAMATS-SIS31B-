<head>
	    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">
    <!-- Scroll Menu -->
    <link href="css/sweetalert.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom functions file -->
    <script src="js/functions.js"></script>
    <!-- Sweet Alert Script -->
    <script src="js/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script></head>
<?php
//require_once("Conexion.php"); 
$nombre = $_POST["usuario"]; 
$password = $_POST["pas"]; 
$name1 = mysqli_connect('localhost','root' ,'' ,'encuestasmaker' );
$consulta = mysqli_query($name1, "SELECT Nombre, Clave FROM usuario WHERE Nombre = '$nombre' AND Clave = '$password'"); 

if(!$consulta){ 
    //echo "<script>alert('usuario no existe')</script>"; 
   // header('Location: loguinadmin.php');
} 
else{ 
 // header('Location: Principal.php'); 
} 


if($user = mysqli_fetch_assoc($consulta)) {
   header('Location: Principal.php');
} else {
   echo "<script>jQuery(function(){swal(\"¡MAL!\", \"Usuario no Existe\", \"warning\");});</script>";
   //header('Location: loguinadmin.php');
}
?>