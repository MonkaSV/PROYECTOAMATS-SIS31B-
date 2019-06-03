

<!DOCTYPE html>

<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, txtUsuario-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link rel="stylesheet" href="estilos2.css">
    
            <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
 
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head> 

<body>
    <form class="formulario" method="post">
    
    <h1>Login</h1>
     <div class="contenedor">
     
     
         
         <div class="input-contenedor">

             <i class="fa fa-id-card icon" aria-hidden="true"></i>      
             <input type="text" placeholder="Carnet/Correo" required name="carnet">
         
         </div>
         
         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input type="password" placeholder="Contraseña" required name="passw">
         
         </div>
         <input type="submit" value="Login" class="button" name="ok2">
         <p>¿No tienes una cuenta? <a class="link" href="registrarvista.php">Registrate </a></p>
     
           <center><a class="link" href="principaluser.php">OMITIR </a></center>
     </div>
     </div>
    </form>

    <?php
//require_once("Conexion.php"); 
if (isset($_POST['ok2'])) {
$nombre = $_POST["carnet"]; 
$password = $_POST["passw"]; 
$name1 = mysqli_connect('localhost','root' ,'' ,'encuestasmaker' );
$consulta = mysqli_query($name1, "SELECT nombre_cliente, Clave FROM clientes WHERE nombre_cliente = '$nombre' AND Clave = '$password'"); 

if($user = mysqli_fetch_assoc($consulta)) {
      echo "<script>jQuery(function(){swal(\"¡BIEN!\", \"Acceso Concedido\", \"success\");});</script>";
   header('Location: principalregistrado.php');

} else {
   echo "<script>jQuery(function(){swal(\"¡MAL!\", \"Usuario no Existe\", \"warning\");});</script>";
   //header('Location: loguinadmin.php');
}
}else{


}
?>    
</body>
</html>