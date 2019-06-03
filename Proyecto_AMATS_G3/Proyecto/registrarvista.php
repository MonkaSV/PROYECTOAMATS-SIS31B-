<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
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

	
<script type="text/javascript">
        function cargar(nom, correo, clave){
            document.frmPersona.nom.value=nom;
            document.frmPersona.correo.value=correo;
            document.frmPersona.clave.value=clave;

        }

    </script>

<?php
 require_once("Conexion.php"); 
 class Persona{
    protected $c;
    public function Persona(){
        //Inicializar lo necesario
        $this->c = new Conexion();
    }
    public function agregar($nom, $correo, $clave){
        $sql = "insert into clientes
        values('$nom', '$correo', '$clave')";
        $this->c->ejecutar($sql);
    }
}
   ?>
</head>  
<?php 
require_once("Conexion.php"); 
class agregarCliente{
    protected $c;
    public function agregarCliente(){

        $this->c = new Conexion();
    }

    function agregarNuevoCliente($nomCliente,$Correo,$Clave){
        $sql="INSERT INTO clientes
           (
           ID_cliente,
             nombre_cliente,
             Correo,
             Clave)
VALUES (
'1',
        '$nomCliente',
        '$Correo',
        '$Clave')";

        $this->c->ejecutar($sql);
    }
}
?>

<?php
  $add= new agregarCliente();

    if (isset($_POST['ok'])) {
          

$usuario = $_POST["nom"]; 
$correo = $_POST["correo"]; 
$password = $_POST["clave"]; 

    $add->agregarNuevoCliente($usuario, $correo, $password);
        
}

?>
<body>
 <form class="formulario" method="post" name="frmPersona">
    
    <h1>Registrate</h1>
     <div class="contenedor">
     
     <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input type="text" placeholder="Nombre Completo/ usuario" required name="nom">
         
         </div>
         
         <div class="input-contenedor">
<i class="fa fa-id-card icon" aria-hidden="true"></i>         
             <input type="text" placeholder="Correo/ Carnet" required name="correo">
         
         </div>
         
         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input type="password" placeholder="Contraseña" required name="clave">
         
         </div>
         <input type="submit" value="Registrate" class="button" name="ok">
         <p>¿Ya tienes una cuenta?<a class="link" href="loguinvista.php">Iniciar Sesión</a></p>
     </div>
    </form>
</body>
</html>