<!DOCTYPE html>
<html>
<head>
	<title></title>
<script type="text/javascript">
		function cargar(id, Nombre, Apellido, email, Clave){
			document.frmPersona.txtId.value=id;
			document.frmPersona.txtNombre.value=Nombre;
			document.frmPersona.txtApellido.value=Apellido;
			document.frmPersona.txtEmail.value=email;
			document.frmPersona.txtClave.value=Clave;
		}

	</script>

	<?php
include 'Conexion.php';

 class Persona{
	protected $c;
	public function Persona(){
		//Inicializar lo necesario
		$this->c = new Conexion();
	}

public function mostrar(){
		$sql = "select * from usuario";
		$resultado=$this->c->consultar($sql);
		$ncampos=mysqli_num_fields($resultado);
		$tabla = "<table border='1px'>";
		//Imprimiendo los encabezados de la tabla

		$tabla .="<tr>";
		while ($encabezado = mysqli_fetch_field($resultado)) {
			$tabla .= "<td><b>".$encabezado->name."</td></b>";
		}//columna extra para las acciones sobre los datos
		$tabla .= "<td><b>Accion</td></b></tr>";
		//Imprimiendo el resto de la tabla

		for ($i=0; $i <$ncampos ; $i++) { 
			while ($fila=mysqli_fetch_row($resultado)) {
				$tabla .="<tr>";
				for ($col=0; $col <$ncampos ; $col++) { 
					$tabla .="<td>".$fila[$col]."</td>";
				} //enlace para cargar la fila al formulario
				$tabla .="<td><b>
				<a href=\"javascript:cargar('$fila[0]', '$fila[1]', '$fila[2]', '$fila[3]', '$fila[4]' \") >
				Cargar</a></td></b>";
				$tabla .="</tr>";
			}
		}
		$tabla .="</table>";
		return $tabla;
	}
	public function modificar($id, $nom, $ape, $email, $Clave){
		$sql = "update usuario set
		Nombre='$nom', Apellido='$ape', Correo='$email', Clave='$Clave'
		where id=$id";
		$this->c->ejecutar($sql);
	}
}
	?>

</head>

<body>
	<form action="#" method="POST" name="frmPersona">
		ID:<input type="text" name="txtId"><br>
		Nombre:<input type="text" name="txtNombre"><br>
		Apellido:<input type="text" name="txtApellido"><br>
		Correo:<input type="text" name="txtEmail"><br>
		Clave:<input type="text" name="txtClave"><br>
	
		<input type="submit" name="btnModificar" value="Modificar">
		
		</form>
</body>
</html>
			<h4>Detalle Tabla Administrador</h4>



<?php
$per = new Persona();
if(isset($_REQUEST["btnModificar"])) {
		$per->modificar($_REQUEST["txtId"],
						$_REQUEST["txtNombre"],
						$_REQUEST["txtApellido"],
						$_REQUEST["txtEmail"],
						$_REQUEST["txtClave"]);
		echo $per->mostrar();
}else{
			echo $per->mostrar();
}
?>