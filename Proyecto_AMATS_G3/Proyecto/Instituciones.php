<head>
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

<center>
	<h1>AQUI APARECERAN LAS INSTITUCIONES DE PROCEDENCIA</h1>
	<br>
	<h3>Ejemplos:</h3>
	<br>
</center>
	<body>


<?php 
require_once("Conexion.php"); 
class agregarInsti{
    protected $c;
    public function agregarInsti(){

        $this->c = new Conexion();
    }

    function agregarNuevoInsti($nomInsti){
        $sql="INSERT INTO institutos
           (
           ID_instituto,
             Nombre_instituto)
VALUES (
'1',
        '$nomInsti')";

        $this->c->ejecutar($sql);
    }
}
?>

<?php
  $add= new agregarInsti();

    if (isset($_POST['ok'])) {
          
	$Nombre_insti = $_POST["nomInsti"]; 
    $add->agregarNuevoInsti($Nombre_insti);

     echo "<script>jQuery(function(){swal(\"¡BIEN!\", \"Institucion Registrada\", \"success\");});</script>";
        
}

?>
<body>
 <form class="formulario" method="post" name="frmPersona">
    
    <h1>Registrar Instituciones</h1>
     <div class="contenedor">
     
     <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input type="text" placeholder="Nombre Completo de Institucion" required name="nomInsti">
         
         </div>

         <input type="submit" value="Registrar" class="button" name="ok">
     </div>
    </form>
</body>
</html>

<p style="margin-left: 135px"><label>Buscar: </label><input type="text" name="Buscar" style="width: 83.5%"></p>
<br> 
<center>
<table  border=2 class="tabla" style="width: 80%; height: 200px ; border-color: white ;  margin: 10px auto">
<tr style="background-color: black"><th><font color="white">ID</th><th><font color="white">Instituto</th><th><font color="white">Porcentaje</th><th><font color="white">Cantidad</th></tr></font></font></font></font>

<tr><td>2</td><td>Centro Escolar INSA</td><td>22.53%</td><td>65</td></tr>
<tr><td>11</td><td>Instituto Nacional Jorge Eliseo Azucena Ortega</td><td>11.46%</td><td>29</td></tr>
<tr style="background-color: black"><th colspan="4"><font color="white">SOLO ES UN EJEMPLO (INTERFAZ)</font></th></tr></font>
</table>
<br>

</table>
		
</center>